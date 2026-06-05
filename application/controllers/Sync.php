<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sync extends CI_Controller
{
    private $default_api_key = 'dev-sync-key-change-me';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('queries');
    }

    public function index()
    {
        if (!$this->is_logged_in_user()) {
            return $this->json_response(['success' => false, 'message' => 'Please login before running sync.'], 401);
        }

        return $this->json_response([
            'success' => true,
            'message' => 'Transaction sync test is ready.',
            'push_url' => $this->local_url('sync/push_transactions'),
            'receive_url' => $this->local_url('sync/receive_transactions')
        ]);
    }

    public function push_transactions()
    {
        if (!$this->is_logged_in_user()) {
            return $this->json_response(['success' => false, 'message' => 'Please login before running sync.'], 401);
        }

        $remote_url = $this->remote_sync_url('sync/receive_transactions');
        $api_key = $this->sync_api_key();

        $repaired_queue_rows = $this->queries->queue_pending_prev_lecod_without_queue();
        $pending = $this->queries->get_pending_sync_queue('tbl_prev_lecod', 50);
        if (empty($pending)) {
            return $this->json_response([
                'success' => true,
                'message' => 'No pending transactions to sync.',
                'pending' => 0,
                'repaired_queue_rows' => $repaired_queue_rows,
                'synced' => 0,
                'failed' => 0
            ]);
        }

        $items = [];
        foreach ($pending as $row) {
            $payload = json_decode($row->payload, true);
            if (!is_array($payload)) {
                $this->queries->mark_sync_queue_failed($row->sync_id, 'Invalid JSON payload in queue.');
                continue;
            }

            $items[] = [
                'sync_id' => (int) $row->sync_id,
                'record_uuid' => $row->record_uuid,
                'action' => $row->action,
                'payload' => $payload
            ];
        }

        if (empty($items)) {
            return $this->json_response([
                'success' => false,
                'message' => 'No valid transaction payloads found.',
                'pending' => count($pending),
                'repaired_queue_rows' => $repaired_queue_rows,
                'synced' => 0,
                'failed' => count($pending)
            ], 422);
        }

        $response = $this->post_json($remote_url, [
            'table' => 'tbl_prev_lecod',
            'items' => $items
        ], $api_key);

        if (!$response['success']) {
            foreach ($items as $item) {
                $this->queries->mark_sync_queue_failed($item['sync_id'], $response['error']);
            }

            return $this->json_response([
                'success' => false,
                'message' => 'Could not contact remote sync server.',
                'remote_url' => $remote_url,
                'error' => $response['error'],
                'pending' => count($pending),
                'repaired_queue_rows' => $repaired_queue_rows,
                'synced' => 0,
                'failed' => count($items)
            ], 502);
        }

        $body = json_decode($response['body'], true);
        if (!is_array($body) || empty($body['success'])) {
            $error = is_array($body) && !empty($body['message']) ? $body['message'] : 'Remote server returned an invalid response.';
            foreach ($items as $item) {
                $this->queries->mark_sync_queue_failed($item['sync_id'], $error);
            }

            return $this->json_response([
                'success' => false,
                'message' => $error,
                'remote_status' => $response['status'],
                'remote_body' => $response['body'],
                'pending' => count($pending),
                'repaired_queue_rows' => $repaired_queue_rows,
                'synced' => 0,
                'failed' => count($items)
            ], 502);
        }

        $synced_uuids = !empty($body['synced_uuids']) && is_array($body['synced_uuids'])
            ? $body['synced_uuids']
            : [];
        $synced_map = array_flip($synced_uuids);
        $synced = 0;
        $failed = 0;

        foreach ($items as $item) {
            if (isset($synced_map[$item['record_uuid']])) {
                $this->queries->mark_sync_queue_synced($item['sync_id'], 'tbl_prev_lecod', $item['record_uuid']);
                $synced++;
            } else {
                $this->queries->mark_sync_queue_failed($item['sync_id'], 'Remote did not confirm this record.');
                $failed++;
            }
        }

        return $this->json_response([
            'success' => true,
            'message' => 'Transaction sync finished.',
            'remote_url' => $remote_url,
            'pending' => count($pending),
            'repaired_queue_rows' => $repaired_queue_rows,
            'synced' => $synced,
            'failed' => $failed,
            'remote' => $body
        ]);
    }

    public function status_transactions()
    {
        if (!$this->is_logged_in_user()) {
            return $this->json_response(['success' => false, 'message' => 'Please login before checking sync status.'], 401);
        }

        $repaired_queue_rows = $this->queries->queue_pending_prev_lecod_without_queue();
        $pending = $this->queries->count_pending_sync_queue('tbl_prev_lecod');

        return $this->json_response([
            'success' => true,
            'pending' => $pending,
            'repaired_queue_rows' => $repaired_queue_rows,
            'message' => $pending > 0 ? 'Pending transactions need sync.' : 'All transactions are synced.'
        ]);
    }

    public function pull_login_master()
    {
        $comp_id = getenv('SYNC_COMP_ID');
        if (empty($comp_id)) {
            $comp_id = $this->session->userdata('comp_id') ?: $this->input->get('comp_id', true);
        }

        if (empty($comp_id)) {
            return $this->json_response([
                'success' => false,
                'message' => 'Set SYNC_COMP_ID in .env before pulling login data.'
            ], 422);
        }

        $branch_id = getenv('SYNC_BRANCH_ID');
        if (empty($branch_id)) {
            $branch_id = $this->session->userdata('blanch_id') ?: $this->input->get('branch_id', true);
        }
        $branch_id = !empty($branch_id) ? (int) $branch_id : null;
        if ($branch_id === 0) {
            $branch_id = null;
        }

        $api_key = $this->sync_api_key();
        $remote_url = $this->remote_sync_url('sync/export_login_master');

        $response = $this->post_json($remote_url, [
            'comp_id' => (int) $comp_id,
            'branch_id' => $branch_id
        ], $api_key);

        if (!$response['success']) {
            return $this->json_response([
                'success' => false,
                'message' => 'Could not contact remote server for login data.',
                'remote_url' => $remote_url,
                'error' => $response['error']
            ], 502);
        }

        $body = json_decode($response['body'], true);
        if (!is_array($body) || empty($body['success']) || empty($body['tables']) || !is_array($body['tables'])) {
            return $this->json_response([
                'success' => false,
                'message' => 'Remote server returned invalid login data.',
                'remote_status' => $response['status'],
                'remote_body' => $response['body']
            ], 502);
        }

        $summary = $this->queries->import_login_master_data($body['tables']);

        return $this->json_response([
            'success' => true,
            'message' => 'Login data sync finished.',
            'remote_url' => $remote_url,
            'comp_id' => (int) $comp_id,
            'branch_id' => $branch_id,
            'summary' => $summary,
            'remote_generated_at' => $body['generated_at'] ?? null
        ]);
    }

    public function export_login_master()
    {
        if (!$this->authorized_sync_request()) {
            return $this->json_response([
                'success' => false,
                'message' => 'Unauthorized sync request.'
            ], 401);
        }

        $raw = $this->input->raw_input_stream;
        $data = json_decode($raw, true);
        if (!is_array($data)) {
            $data = [];
        }

        $comp_id = !empty($data['comp_id']) ? (int) $data['comp_id'] : (int) $this->input->get('comp_id', true);
        if ($comp_id <= 0) {
            return $this->json_response([
                'success' => false,
                'message' => 'Missing comp_id.'
            ], 422);
        }

        $branch_id = !empty($data['branch_id']) ? (int) $data['branch_id'] : null;
        $payload = $this->queries->export_login_master_data($comp_id, $branch_id);

        return $this->json_response([
            'success' => true,
            'message' => 'Login master data exported.',
            'comp_id' => $payload['comp_id'],
            'branch_id' => $payload['branch_id'],
            'generated_at' => $payload['generated_at'],
            'tables' => $payload['tables']
        ]);
    }

    public function receive_transactions()
    {
        if (!$this->authorized_sync_request()) {
            return $this->json_response([
                'success' => false,
                'message' => 'Unauthorized sync request.'
            ], 401);
        }

        $raw = $this->input->raw_input_stream;
        $data = json_decode($raw, true);
        if (!is_array($data) || ($data['table'] ?? null) !== 'tbl_prev_lecod' || empty($data['items']) || !is_array($data['items'])) {
            return $this->json_response([
                'success' => false,
                'message' => 'Invalid transaction sync payload.'
            ], 422);
        }

        $synced_uuids = [];
        $errors = [];

        foreach ($data['items'] as $item) {
            $payload = isset($item['payload']) && is_array($item['payload']) ? $item['payload'] : null;
            if (empty($payload)) {
                $errors[] = ['record_uuid' => $item['record_uuid'] ?? null, 'error' => 'Missing payload'];
                continue;
            }

            $result = $this->queries->receive_prev_lecod_sync_payload($payload);
            if (!empty($result['success'])) {
                $synced_uuids[] = $result['sync_uuid'];
            } else {
                $errors[] = [
                    'record_uuid' => $item['record_uuid'] ?? ($payload['sync_uuid'] ?? null),
                    'error' => $result['error'] ?? 'Unknown receive error'
                ];
            }
        }

        return $this->json_response([
            'success' => true,
            'message' => 'Transaction payload received.',
            'synced_uuids' => $synced_uuids,
            'errors' => $errors
        ]);
    }

    private function sync_api_key()
    {
        $api_key = getenv('SYNC_API_KEY');
        return !empty($api_key) ? $api_key : $this->default_api_key;
    }

    private function authorized_sync_request()
    {
        $incoming_key = $this->input->get_request_header('X-Sync-Key', true);
        return hash_equals($this->sync_api_key(), (string) $incoming_key);
    }

    private function remote_sync_url($path)
    {
        $remote_url = getenv('SYNC_REMOTE_URL');
        if (empty($remote_url)) {
            return $this->local_url($path);
        }

        if (preg_match('#/sync/[^/?#]+#', $remote_url)) {
            return preg_replace('#/sync/[^/?#]+#', '/' . ltrim($path, '/'), $remote_url, 1);
        }

        return rtrim($remote_url, '/') . '/' . ltrim($path, '/');
    }

    private function post_json($url, array $payload, $api_key)
    {
        $body = json_encode($payload);

        if (function_exists('curl_init')) {
            $ch = curl_init($url);
            curl_setopt_array($ch, [
                CURLOPT_POST => true,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => [
                    'Content-Type: application/json',
                    'X-Sync-Key: ' . $api_key
                ],
                CURLOPT_POSTFIELDS => $body,
                CURLOPT_CONNECTTIMEOUT => 10,
                CURLOPT_TIMEOUT => 30
            ]);
            $response_body = curl_exec($ch);
            $error = curl_error($ch);
            $status = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if ($response_body === false) {
                return ['success' => false, 'error' => $error ?: 'cURL request failed.', 'status' => $status, 'body' => ''];
            }

            return ['success' => $status >= 200 && $status < 300, 'error' => '', 'status' => $status, 'body' => $response_body];
        }

        $context = stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => "Content-Type: application/json\r\nX-Sync-Key: {$api_key}\r\n",
                'content' => $body,
                'timeout' => 30
            ]
        ]);
        $response_body = @file_get_contents($url, false, $context);
        if ($response_body === false) {
            return ['success' => false, 'error' => 'HTTP request failed.', 'status' => 0, 'body' => ''];
        }

        return ['success' => true, 'error' => '', 'status' => 200, 'body' => $response_body];
    }

    private function local_url($path)
    {
        $base = base_url($path);
        if (preg_match('#^https?://#i', $base)) {
            return $base;
        }

        $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
        return $scheme . '://' . $host . '/' . ltrim($path, '/');
    }

    private function json_response(array $data, $status = 200)
    {
        $this->output
            ->set_status_header($status)
            ->set_content_type('application/json')
            ->set_output(json_encode($data, JSON_PRETTY_PRINT));
    }

    private function is_logged_in_user()
    {
        return (bool) ($this->session->userdata('comp_id') || $this->session->userdata('empl_id'));
    }
}
