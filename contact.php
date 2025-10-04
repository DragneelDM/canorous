<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Ensure PHPMailer is installed

header('Content-Type: application/json'); // 👈 return JSON

$response = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response = ["status" => "error", "message" => "Invalid email format!"];
    } elseif (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $response = ["status" => "error", "message" => "All fields are required!"];
    } else {
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'mail.can-india.co.in';
            $mail->SMTPAuth = true;
            $mail->Username = 'sales@can-india.co.in';
            $mail->Password = 'canorous@sales';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            $mail->setFrom($email, $name);
            $mail->addAddress('sales@can-india.co.in');
            $mail->Subject = $subject;
            $mail->Body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

            $mail->send();
            $response = ["status" => "success", "message" => "Your message has been sent successfully!"];
        } catch (Exception $e) {
            $response = ["status" => "error", "message" => "Mailer Error: " . $mail->ErrorInfo];
        }
    }
} else {
    $response = ["status" => "error", "message" => "Invalid request method."];
}

echo json_encode($response);
exit;
