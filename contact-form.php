<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $mail = new PHPMailer(true);

    try {
        // ✅ SMTP settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ta475232@gmail.com'; // tumhara gmail
        $mail->Password = 'gogxtzvozofpiyrk';   // app password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        // ✅ Form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $company = $_POST['company'];
        $message = $_POST['message'];
        $topic = $_POST['topic'];

        // ✅ Email settings
        $mail->setFrom('ta475232@gmail.com', 'Website Contact');
        $mail->addAddress('ta475232@gmail.com'); // jahan email receive karni hai
        $mail->addReplyTo($email, $name);

        $mail->Subject = "New Inquiry from Website";

        $mail->Body = "Name: $name\nEmail: $email\nCompany: $company\nTopic: $topic\nMessage:\n$message";

        // ✅ Send
        $mail->send();

        echo "Thank you! We will get back to you soon.";

    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}
?>