<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master\PHPMailer-master\src\Exception.php';
require 'PHPMailer-master\PHPMailer-master\src\PHPMailer.php';
require 'PHPMailer-master\PHPMailer-master\src\SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $number = htmlspecialchars($_POST['number']);
    $telnum = htmlspecialchars($_POST['telnum']);
    $ship_from = htmlspecialchars($_POST['ship_from']);
    $ship_to = htmlspecialchars($_POST['ship_to']);
    $cubic_meter = htmlspecialchars($_POST['cubic_meter']);
    $kilograms = htmlspecialchars($_POST['kilograms']);
    $value_usd = htmlspecialchars($_POST['value_usd']);
    $description = htmlspecialchars($_POST['description']);

    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'jlmanahan.rbmbopc@gmail.com'; // Your email address
        $mail->Password = 'yfsahmrmmsddxxno'; // Your email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('jlmanahan.rbmbopc@gmail.com', 'OCM Website Quote Requests');
        $mail->addAddress('ocmcustomsbrokerage0722@gmail.com', 'OCM Customs Brokerage, OPC'); // Where emails are sent

        // Content
        $mail->isHTML(true);
        $mail->Subject = "New Quote Request from $name";
        $mail->Body = "
        <h2>Quotation Request Details</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Number:</strong> $number</p>
        <p><strong>Tel. No.:</strong> $telnum</p>
        <p><strong>Ship From:</strong> $ship_from</p>
        <p><strong>Ship To:</strong> $ship_to</p>
        <p><strong>Estimated Cubic Meter:</strong> $cubic_meter</p>
        <p><strong>Estimated Kilograms:</strong> $kilograms</p>
        <p><strong>Estimated Value in USD:</strong> $value_usd</p>
        <p><strong>Description:</strong> $description</p>
        ";

        if ($mail->send()) {
            echo "Thank you, $name! Your quote request has been submitted.";
        } else {
            echo "Sorry, there was an issue sending your quote request.";
        }
    } catch (Exception $e) {
        echo "Sorry, there was an issue sending your quote request. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid request.";
}
?>
