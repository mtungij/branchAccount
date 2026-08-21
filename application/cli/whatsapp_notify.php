<?php
/**
 * Background WhatsApp sender. Launched detached (via exec ... &) from
 * notify_whatsapp_deposit() in Admin.php / Oficer.php so the deposit
 * request never waits on the Gowa API. Never invoked over HTTP.
 *
 * Usage: php whatsapp_notify.php /path/to/payload.json
 */

if (PHP_SAPI !== 'cli') {
    exit(1);
}

$app_path  = __DIR__ . '/../';
$base_path = $app_path . '../';
$log_file  = $app_path . 'tmp/whatsapp_errors.log';

function wa_log($log_file, $message)
{
    @file_put_contents($log_file, '[' . date('Y-m-d H:i:s') . '] ' . $message . "\n", FILE_APPEND);
}

$payload_file = $argv[1] ?? null;

if (!$payload_file || !is_file($payload_file)) {
    exit(1);
}

$payload = json_decode(file_get_contents($payload_file), true);
@unlink($payload_file);

if (!is_array($payload)) {
    exit(1);
}

$phone        = $payload['phone'] ?? '';
$text         = $payload['text'] ?? '';
$receipt_path = $payload['receipt_path'] ?? null;

require $app_path . 'helpers/env_helper.php';
load_env($base_path . '.env');
require $base_path . 'vendor/autoload.php';
require $app_path . 'libraries/Gowa.php';

try {
    $gowa = new Gowa();

    if ($gowa->is_configured() && $phone !== '') {
        if ($text !== '') {
            $gowa->send_text($phone, $text);
        }

        if ($receipt_path && is_file($receipt_path)) {
            $gowa->send_file($phone, $receipt_path, 'Risiti ya malipo');
        }
    }
} catch (\Throwable $e) {
    wa_log($log_file, 'Deposit WhatsApp send failed for ' . $phone . ': ' . $e->getMessage());
}

if ($receipt_path && is_file($receipt_path)) {
    @unlink($receipt_path);
}
