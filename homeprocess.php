<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

// Configuration
$recaptchaSecret = "6Lfvis8rAAAAADVeSDIHIgVfmyvWznk1SIdx-RMq";
$fromEmail = "info@shellautomotiv.com";
$fromName = "Shell Automotive";
$toEmail = "info@shellautomotiv.com";
$smtpPassword = "Shellautomotive@~1234";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: error.php?message=' . urlencode('Invalid request method'));
    exit;
}

// Verify reCAPTCHA
$recaptchaResponse = $_POST['g-recaptcha-response'] ?? '';
if (empty($recaptchaResponse)) {
    header('Location: error.php?message=' . urlencode('Please complete the reCAPTCHA!'));
    exit;
}

$verifyUrl = "https://www.google.com/recaptcha/api/siteverify";
$data = [
    'secret' => $recaptchaSecret,
    'response' => $recaptchaResponse,
    'remoteip' => $_SERVER['REMOTE_ADDR']
];

$ch = curl_init($verifyUrl);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
$response = curl_exec($ch);
curl_close($ch);

$respData = json_decode($response, true);
if (!isset($respData['success']) || $respData['success'] !== true) {
    header('Location: error.php?message=' . urlencode('reCAPTCHA verification failed. Try again!'));
    exit;
}

// Sanitize form inputs
$name = filter_var(trim($_POST['name'] ?? ''), FILTER_SANITIZE_STRING);
$phone = filter_var(trim($_POST['phone'] ?? ''), FILTER_SANITIZE_STRING);
$message = filter_var(trim($_POST['message'] ?? ''), FILTER_SANITIZE_STRING);

// Validate required fields
if (empty($name) || empty($phone) || empty($message)) {
    header('Location: error.php?message=' . urlencode('Please fill all required fields!'));
    exit;
}

// Send email using PHPMailer
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com';
    $mail->SMTPAuth = true;
    $mail->Username = $fromEmail;
    $mail->Password = $smtpPassword;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom($fromEmail, $fromName);
    $mail->addAddress($toEmail);

    $mail->isHTML(true);
    $mail->Subject = "New Contact Inquiry from Website (Home Form)";
    $mail->Body = "
        <h2>New Contact Inquiry (Home Form)</h2>
        <p><strong>Name:</strong> " . htmlspecialchars($name) . "</p>
        <p><strong>Phone:</strong> " . htmlspecialchars($phone) . "</p>
        <p><strong>Message:</strong><br>" . nl2br(htmlspecialchars($message)) . "</p>
        <p>IP: " . $_SERVER['REMOTE_ADDR'] . "</p>
    ";

    $mail->send();
    header('Location: successfullysubmitted.php');
    exit;

} catch (Exception $e) {
    error_log("Mail failed: " . $mail->ErrorInfo);
    header('Location: error.php?message=' . urlencode('Failed to send email. Please try again!'));
    exit;
}
?>