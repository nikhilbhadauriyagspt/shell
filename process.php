<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

// JSON response ke liye header set karo
header('Content-Type: application/json');

// CONFIG
$recaptchaSecret = "6Lfvis8rAAAAADVeSDIHIgVfmyvWznk1SIdx-RMq";
$fromEmail = "info@shellautomotiv.com";
$fromName = "Shell Automotive";
$toEmail = "info@shellautomotiv.com";
$smtpPassword = "Shellautomotive@~1234";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['error' => 'Invalid request method']);
    exit;
}

// 1️⃣ Verify reCAPTCHA
$recaptchaResponse = $_POST['g-recaptcha-response'] ?? '';
if (empty($recaptchaResponse)) {
    echo json_encode(['error' => 'Please complete the reCAPTCHA!']);
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
    echo json_encode(['error' => 'reCAPTCHA verification failed. Try again!']);
    exit;
}

// 2️⃣ Sanitize form inputs
$name = filter_var(trim($_POST['name'] ?? ''), FILTER_SANITIZE_STRING);
$phone = filter_var(trim($_POST['phone'] ?? ''), FILTER_SANITIZE_STRING);
$message = filter_var(trim($_POST['message'] ?? ''), FILTER_SANITIZE_STRING);

// Basic validation for required fields
if (empty($name) || empty($phone) || empty($message)) {
    echo json_encode(['error' => 'Please fill all required fields!']);
    exit;
}

// 3️⃣ Prepare PHPMailer
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.hostinger.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = $fromEmail;
    $mail->Password   = $smtpPassword;
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom($fromEmail, $fromName);
    $mail->addAddress($toEmail);

    $mail->isHTML(true);
    $mail->Subject = "New Contact Inquiry from Website";
    $mail->Body    = "
        <h2>New Contact Inquiry</h2>
        <p><strong>Name:</strong> " . htmlspecialchars($name) . "</p>
        <p><strong>Phone:</strong> " . htmlspecialchars($phone) . "</p>
        <p><strong>Message:</strong><br>" . nl2br(htmlspecialchars($message)) . "</p>
        <p>IP: " . $_SERVER['REMOTE_ADDR'] . "</p>
    ";

    $mail->send();
    echo json_encode(['success' => true]); // Success response
    exit;

} catch (Exception $e) {
    error_log("Mail failed: " . $mail->ErrorInfo);
    echo json_encode(['error' => 'Failed to send email. Please try again!']);
    exit;
}
?>