<?php
/**
 * tauranga.ai — Contact Form Handler
 * Update $to_email before going live.
 */

$to_email = 'hello@tauranga.ai'; // <-- Change this to your receiving email address

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /');
    exit;
}

// Determine where to redirect back to
$referrer = isset($_POST['referrer']) ? filter_var($_POST['referrer'], FILTER_SANITIZE_URL) : '/';
$allowed_paths = ['/', '/trades.php', '/dentists.php', '/accountants.php'];
if (!in_array(parse_url($referrer, PHP_URL_PATH), $allowed_paths)) {
    $referrer = '/';
}

// Honeypot check — bots fill this hidden field; humans leave it blank
if (!empty($_POST['website'])) {
    header('Location: ' . $referrer . '?sent=1'); // Silently drop spam
    exit;
}

// Sanitise & validate inputs
$name    = isset($_POST['name'])    ? trim(htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8'))    : '';
$email   = isset($_POST['email'])   ? trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL))       : '';
$biz     = isset($_POST['biz'])     ? trim(htmlspecialchars($_POST['biz'], ENT_QUOTES, 'UTF-8'))     : '';
$type    = isset($_POST['type'])    ? trim(htmlspecialchars($_POST['type'], ENT_QUOTES, 'UTF-8'))    : '';
$message = isset($_POST['message']) ? trim(htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8')) : '';

// Required field checks
if (empty($name) || empty($email) || empty($message)) {
    header('Location: ' . $referrer . '?error=1');
    exit;
}

// Email validation
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: ' . $referrer . '?error=1');
    exit;
}

// Build email
$subject = 'New Consultation Request — tauranga.ai';

$body  = "Name: {$name}\n";
$body .= "Email: {$email}\n";
$body .= "Business: {$biz}\n";
$body .= "Industry / Interest: {$type}\n";
$body .= "\nMessage:\n{$message}\n";
$body .= "\n---\nSent via tauranga.ai contact form";

$headers  = "From: no-reply@tauranga.ai\r\n";
$headers .= "Reply-To: {$email}\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

$sent = mail($to_email, $subject, $body, $headers);

if ($sent) {
    header('Location: ' . $referrer . '?sent=1');
} else {
    header('Location: ' . $referrer . '?error=1');
}
exit;
