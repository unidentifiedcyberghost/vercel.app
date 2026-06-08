<?php
session_start();

// Simple admin credentials — replace with secure values and consider stronger auth (2FA)
define('ADMIN_USER', 'admin');
define('ADMIN_PASS', 'ChangeThisPassword!'); // change immediately

$KEY_FILE = __DIR__ . '/keys/secret.key.php';
$STORAGE_FILE = __DIR__ . '/storage/submissions.enc';

if (!file_exists($KEY_FILE)) {
    die('Key file missing.');
}
$keys = include $KEY_FILE;
$key = $keys['aes_key'];
$iv  = $keys['aes_iv'];

function decrypt_data($cipher_b64, $key, $iv){
    $cipher = base64_decode($cipher_b64);
    return openssl_decrypt($cipher, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
}

$errors = [];
if (isset($_POST['login'])) {
    $user = $_POST['user'] ?? '';
    $pass = $_POST['pass'] ?? '';
    if ($user === ADMIN_USER && $pass === ADMIN_PASS) {
        $_SESSION['admin'] = true;
        header('Location: admin.php');
        exit;
    } else {
        $errors[] = 'Invalid credentials.';
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: admin.php');
    exit;
}

if (!empty($_SESSION['admin'])) {
    // Show admin panel
    $rows = [];
    if (file_exists($STORAGE_FILE)) {
        $lines = file($STORAGE_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            $json = decrypt_data($line, $key, $iv);
            if ($json !== false) {
                $rows[] = json_decode($json, true);
            } else {
                $rows[] = ['error' => 'decryption_failed'];
            }
        }
    }
    ?>
    <!doctype html>
    <html lang="en">
    <head><meta charset="utf-8"><title>Admin — TEAM WHITE HAT</title><link rel="stylesheet" href="assets/style.css"></head>
    <body class="dark">
      <main style="max-width:1000px;margin:40px auto;padding:20px;">
        <h1>Admin Console</h1>
        <p><a href="export.php" target="_blank">Download encrypted export (decrypted CSV)</a> · <a href="admin.php?logout=1">Logout</a></p>
        <section class="panel">
          <h2>Recent submissions (decrypted)</h2>
          <?php if (empty($rows)): ?><p>No submissions yet.</p><?php else: ?>
            <table style="width:100%;border-collapse:collapse;color:#cfcfcf">
              <thead><tr><th style="text-align:left">Timestamp</th><th>IP</th><th>Name</th><th>Email</th><th>Notes</th></tr></thead>
              <tbody>
                <?php foreach (array_reverse($rows) as $r): ?>
                  <tr>
                    <td><?=htmlspecialchars($r['timestamp'] ?? 'n/a')?></td>
                    <td><?=htmlspecialchars($r['ip'] ?? '')?></td>
                    <td><?=htmlspecialchars($r['name'] ?? '')?></td>
                    <td><?=htmlspecialchars($r['email'] ?? '')?></td>
                    <td><?=htmlspecialchars($r['notes'] ?? '')?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          <?php endif; ?>
        </section>
      </main>
    </body>
    </html>
    <?php
    exit;
}
?>
<!doctype html>
<html lang="en">
<head><meta charset="utf-8"><title>Admin Login</title><link rel="stylesheet" href="assets/style.css"></head>
<body class="dark">
  <main style="max-width:420px;margin:80px auto;padding:20px;">
    <h1>Admin Login</h1>
    <?php if (!empty($errors)): ?><div class="notice error"><ul><?php foreach ($errors as $e) echo "<li>".htmlspecialchars($e)."</li>"; ?></ul></div><?php endif; ?>
    <form method="post">
      <label class="field"><span class="label">User</span><input name="user" type="text"></label>
      <label class="field"><span class="label">Password</span><input name="pass" type="password"></label>
      <div class="actions"><button name="login" class="btn" type="submit">Login</button></div>
    </form>
  </main>
</body>
</html>
