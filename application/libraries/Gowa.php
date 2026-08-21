<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Thin client for the self-hosted Gowa WhatsApp API (https://notify.buildcore.site).
 * Config comes from .env: GOWA_URL, GOWA_USERNAME, GOWA_PASSWORD, GOWA_DEVICE_ID.
 */
class Gowa {

    protected $base_url;
    protected $username;
    protected $password;
    protected $device_id;

    public function __construct()
    {
        $this->base_url  = rtrim((string) getenv('GOWA_URL'), '/');
        $this->username  = getenv('GOWA_USERNAME');
        $this->password  = getenv('GOWA_PASSWORD');
        $this->device_id = getenv('GOWA_DEVICE_ID');
    }

    public function is_configured()
    {
        return $this->base_url !== '' && $this->username && $this->password && $this->device_id;
    }

    /**
     * $phone accepts a plain number ("255700000000") or a full JID.
     */
    public function send_text($phone, $message, $reply_to = null)
    {
        return $this->post('/send/message', array_filter([
            'phone'            => $phone,
            'message'          => $message,
            'reply_message_id' => $reply_to,
        ], function ($v) { return $v !== null && $v !== ''; }));
    }

    public function send_file($phone, $absolute_path, $caption = '')
    {
        if (!is_file($absolute_path)) {
            throw new RuntimeException('WhatsApp file not found: ' . $absolute_path);
        }

        $mime = function_exists('mime_content_type') ? (mime_content_type($absolute_path) ?: 'application/octet-stream') : 'application/octet-stream';

        return $this->post_multipart('/send/file', [
            'phone'   => $phone,
            'caption' => $caption,
            'file'    => curl_file_create($absolute_path, $mime, basename($absolute_path)),
        ]);
    }

    protected function post($path, array $payload)
    {
        return $this->execute_with_retry(function () use ($path, $payload) {
            $ch = curl_init($this->base_url . $path);
            curl_setopt_array($ch, [
                CURLOPT_POST           => true,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT        => 30,
                CURLOPT_CONNECTTIMEOUT => 15,
                CURLOPT_USERPWD        => $this->username . ':' . $this->password,
                CURLOPT_HTTPHEADER     => [
                    'Content-Type: application/json',
                    'X-Device-Id: ' . $this->device_id,
                ],
                CURLOPT_POSTFIELDS => json_encode($payload),
            ]);

            return $ch;
        });
    }

    protected function post_multipart($path, array $fields)
    {
        return $this->execute_with_retry(function () use ($path, $fields) {
            $ch = curl_init($this->base_url . $path);
            curl_setopt_array($ch, [
                CURLOPT_POST           => true,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT        => 60,
                CURLOPT_CONNECTTIMEOUT => 15,
                CURLOPT_USERPWD        => $this->username . ':' . $this->password,
                CURLOPT_HTTPHEADER     => [
                    'X-Device-Id: ' . $this->device_id,
                ],
                CURLOPT_POSTFIELDS => $fields,
            ]);

            return $ch;
        });
    }

    /**
     * The server's TLS handshake is occasionally slow/flaky (a few seconds,
     * sometimes a full stall), so a transport-level failure gets one retry
     * before giving up. Retries never happen for a request that actually
     * reached the server (an HTTP response, even an error one).
     */
    protected function execute_with_retry($build_curl)
    {
        $attempts = 2;
        $last_error = null;

        for ($i = 1; $i <= $attempts; $i++) {
            $ch = $build_curl();
            $raw = curl_exec($ch);
            $err = curl_error($ch);
            curl_close($ch);

            if ($raw !== false) {
                return $this->parse_response($raw);
            }

            $last_error = $err;
        }

        throw new RuntimeException('WhatsApp request failed: ' . $last_error);
    }

    protected function parse_response($raw)
    {
        $body = json_decode($raw, true);

        if (!is_array($body) || ($body['code'] ?? null) !== 'SUCCESS') {
            throw new RuntimeException($body['message'] ?? 'WhatsApp request failed');
        }

        return is_array($body['results'] ?? null) ? $body['results'] : [];
    }
}
