<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = filter_var(trim($_POST["user_name"]), FILTER_SANITIZE_STRING);
    $phone = filter_var(trim($_POST["user_phone"]), FILTER_SANITIZE_STRING);
    $message = filter_var(trim($_POST["user_message"]), FILTER_SANITIZE_STRING);

    // Email configuration
    $to = "shellautomotiv@gmail.com";
    $subject = "New Website Enquiry Form";
    $email_message = "Name: $name\nPhone: $phone\nMessage: $message";

    // Email headers
    $headers = "From: no-reply@yourdomain.com\r\n"; // Replace with a valid domain email
    $headers .= "Reply-To: no-reply@yourdomain.com\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send email
    if (mail($to, $subject, $email_message, $headers)) {
        // Redirect back with a success status
        header("Location:successfullysubmitted.php");
        exit;
    } else {
        // Redirect back with an error status
        header("Location:https://www.shellautomotiv.com/ceramic-coating?status=error");
        exit;
    }
}
?>
