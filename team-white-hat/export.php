<?php
session_start();

if (empty($_SESSION['admin'])) {
    http_response_code(403);
    echo "Forbidden";
    exit;
}

$KEY_FILE = __DIR__ . '/keys/secret.key.php';
$STORAGE_FILE = __DIR__ . '/storage/submissions.enc';

if (!file_exists($KEY_FILE)) {
    http_response_code(500);
    echo "Key file missing.";
    exit;
}
$keys = include $KEY_FILE;
$key = $keys['aes_key'];
$iv  = $keys['aes_iv'];

function decrypt_data($cipher_b64, $key, $iv){
    $cipher = base64_decode($cipher_b64);
    return openssl_decrypt($cipher, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
}

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="submissions_export.csv"');

$out = fopen('php://output', 'w');
fputcsv($out, ['timestamp','ip','user_agent','name','email','notes','consent']);

if (file_exists($STORAGE_FILE)) {
    $lines = file($STORAGE_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $json = decrypt_data($line, $key, $iv);
        if ($json === false) continue;
        $row = json_decode($json, true);
        if (is_array($row)) {
            fputcsv($out, [
                $row['timestamp'] ?? '',
                $row['ip'] ?? '',
                $row['user_agent'] ?? '',
                $row['name'] ?? '',
                $row['email'] ?? '',
                $row['notes'] ?? '',
                $row['consent'] ?? ''
            ]);
        }
    }
}
fclose($out);
exit;
