<?php
session_start();

// Paths (adjust if you moved keys outside webroot)
$KEY_FILE = __DIR__ . '/keys/secret.key.php';
$STORAGE_FILE = __DIR__ . '/storage/submissions.enc';

// Ensure storage directory exists
if (!is_dir(dirname($STORAGE_FILE))) {
    mkdir(dirname($STORAGE_FILE), 0750, true);
}

// Load keys
if (!file_exists($KEY_FILE)) {
    die('Encryption key file missing. Create keys/secret.key.php and keep it secure.');
}
$keys = include $KEY_FILE;
$key = $keys['aes_key'];
$iv  = $keys['aes_iv'];

// CSRF token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$errors = [];
$success = false;

function encrypt_data($plaintext, $key, $iv){
    $cipher = openssl_encrypt($plaintext, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
    return base64_encode($cipher);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['csrf_token'] ?? '';
    if (!hash_equals($_SESSION['csrf_token'], $token)) {
        $errors[] = "Invalid session token.";
    }

    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $notes = trim($_POST['notes'] ?? '');
    $consent = isset($_POST['consent']) && $_POST['consent'] === 'on';

    if ($name === '') $errors[] = "Name is required.";
    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid email required.";
    if (!$consent) $errors[] = "Consent is required.";

    if (empty($errors)) {
        $row = [
            'timestamp' => gmdate('Y-m-d H:i:s'),
            'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
            'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'unknown',
            'name' => $name,
            'email' => $email,
            'notes' => $notes,
            'consent' => $consent ? 'yes' : 'no'
        ];
        $json = json_encode($row, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        $enc = encrypt_data($json, $key, $iv);

        // Append encrypted line with exclusive lock
        $fp = fopen($STORAGE_FILE, 'a');
        if ($fp) {
            if (flock($fp, LOCK_EX)) {
                fwrite($fp, $enc . PHP_EOL);
                fflush($fp);
                flock($fp, LOCK_UN);
                fclose($fp);
                $success = true;
                $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
            } else {
                fclose($fp);
                $errors[] = "Server busy. Try again.";
            }
        } else {
            $errors[] = "Unable to write to storage. Check permissions.";
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>TEAM WHITE HAT — Secure Console</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="assets/style.css">
</head>
<body class="dark">
  <div id="boot-screen" class="boot">
    <canvas id="boot-canvas"></canvas>
    <div class="boot-overlay">
      <div class="boot-lines" id="boot-lines">
        <div class="line">Initializing TEAM WHITE HAT Secure Console...</div>
        <div class="line">Loading kernel modules...</div>
        <div class="line">Establishing secure tunnel...</div>
        <div class="line">Authenticating environment...</div>
        <div class="line">Boot sequence complete. Press Enter to continue.</div>
      </div>
      <button id="enter-btn" class="enter-btn">Enter Console</button>
    </div>
  </div>

  <main id="main-app" class="hidden">
    <header class="header">
      <h1>TEAM WHITE HAT</h1>
      <p class="subtitle">Ethical security research portal</p>
    </header>

    <section class="panel">
      <?php if ($success): ?>
        <div class="notice success">Thank you. Your submission was recorded with consent.</div>
      <?php endif; ?>
      <?php if (!empty($errors)): ?>
        <div class="notice error"><ul><?php foreach ($errors as $e): ?><li><?=htmlspecialchars($e, ENT_QUOTES, 'UTF-8')?></li><?php endforeach; ?></ul></div>
      <?php endif; ?>

      <form id="info-form" method="post" novalidate>
        <input type="hidden" name="csrf_token" value="<?=htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8')?>">
        <label class="field"><span class="label">Full name</span><input name="name" type="text" required maxlength="100"></label>
        <label class="field"><span class="label">Email address</span><input name="email" type="email" required maxlength="150"></label>
        <label class="field"><span class="label">Notes (optional)</span><textarea name="notes" rows="4" maxlength="1000"></textarea></label>
        <label class="consent"><input type="checkbox" name="consent" required><span>I consent to collection and storage for legitimate security research purposes.</span></label>
        <div class="actions"><button type="submit" class="btn">Submit</button><button type="button" id="clear-btn" class="btn ghost">Clear</button></div>
        <p class="privacy"><strong>Privacy notice:</strong> Data stored encrypted on this server. See <a href="privacy.php">Privacy Policy</a>.</p>
      </form>
    </section>

    <footer class="footer">
      <small>github: <a href="https://github.com/unidentifiedcyberghost" target="_blank" rel="noopener noreferrer">https://github.com/unidentifiedcyberghost</a></small>
      <small>instagram: <a href="https://www.instagram.com/pinoyunknown" target="_blank" rel="noopener noreferrer">https://www.instagram.com/pinoyunknown</a></small>
      <small><a href="admin.php">Admin</a> · <a href="privacy.php">Privacy</a></small>
    </footer>
  </main>

  <script src="assets/script.js"></script>
</body>
</html>
