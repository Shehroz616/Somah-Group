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
        $company_turnover = $_POST['company_turnover'];
        $message = $_POST['message'];
        $topic = $_POST['topic'];

        // ✅ Email settings
        $mail->setFrom('ta475232@gmail.com', 'Website Contact');
        $mail->addAddress('ta475232@gmail.com');
        $mail->addReplyTo($email, $name);

       $mail->isHTML(true);
        $mail->Subject = "Somah Group";


$mail->Body = <<<HTML
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Email</title>
</head>

<body style="margin:0;padding:0;background-color:#f4f4f4;font-family:Arial,sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="background:#f4f4f4;padding:clamp(5px,2vw,20px) 0;">
<tr>
<td align="center">

    <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff;border-radius:6px;overflow:hidden;">

        <tr>
            <td style="padding:20px;border-bottom:1px solid #e0e0e0;">
                <span style="font-size:22px;font-size:clamp(18px,2vw,22px);font-weight:bold;color:#111;font-family:Georgia,serif;">Somah</span>
                <span style="font-size:22px;font-size:clamp(18px,2vw,22px);color:#111;font-family:Georgia,serif;">Group</span>
            </td>
        </tr>

        <tr>
            <td style="padding:25px;">
                <p style="font-size:12px;font-size:clamp(10px,1.5vw,12px);color:#888;text-transform:uppercase;letter-spacing:1px;margin-bottom:20px;">
                    New Contact Form Submission
                </p>

                <p style="margin:0 0 10px;">
                    <strong style="font-size:11px;font-size:clamp(10px,1.4vw,11px);color:#999;">NAME</strong><br>
                    <span style="font-size:15px;font-size:clamp(13px,1.8vw,15px);color:#222;">$name</span>
                </p>

                <p style="margin:0 0 10px;">
                    <strong style="font-size:11px;font-size:clamp(10px,1.4vw,11px);color:#999;">EMAIL</strong><br>
                    <a href="mailto:$email" style="font-size:15px;font-size:clamp(13px,1.8vw,15px);color:#111;text-decoration:none;">$email</a>
                </p>

                <p style="margin:0 0 10px;">
                    <strong style="font-size:11px;font-size:clamp(10px,1.4vw,11px);color:#999;">COMPANY</strong><br>
                    <span style="font-size:15px;font-size:clamp(13px,1.8vw,15px);color:#222;">$company</span>
                </p>

                <p style="margin:0 0 10px;">
                    <strong style="font-size:11px;font-size:clamp(10px,1.4vw,11px);color:#999;">COMPANY TURNOVER</strong><br>
                    <span style="font-size:15px;font-size:clamp(13px,1.8vw,15px);color:#222;">$company_turnover</span>
                </p>

                <p style="margin:0 0 20px;">
                    <strong style="font-size:11px;font-size:clamp(10px,1.4vw,11px);color:#999;">Inquiry Type</strong><br>
                    <span style="font-size:15px;font-size:clamp(13px,1.8vw,15px);color:#222;">$topic</span>
                </p>

                <hr style="border:none;border-top:1px solid #e8e8e8;margin:20px 0;">

                <p style="font-size:11px;font-size:clamp(10px,1.4vw,11px);color:#999;margin-bottom:8px;">
                    <strong>MESSAGE</strong>
                </p>

                <table width="100%" cellpadding="0" cellspacing="0" style="background:#f9f9f9;border-left:3px solid #111;">
                    <tr>
                        <td style="padding:15px;">
                            <p style="margin:0;font-size:15px;font-size:clamp(13px,1.8vw,15px);color:#333;line-height:1.6;">
                                $message
                            </p>
                        </td>
                    </tr>
                </table>

            </td>
        </tr>

        <tr>
            <td style="background:#111;color:#888;padding:15px 20px;font-size:12px;font-size:clamp(10px,1.5vw,12px);">
                <table width="100%">
                    <tr>
                        <td>
                            © 2024 Somah Group. All rights reserved.
                        </td>
                        <td align="right">
                            <a href="https://www.linkedin.com/company/uk-supply-chain-funding" style="margin-left:10px;">
                                <img style="background-color:#fff;" width="18" height="18" src="https://img.icons8.com/ios-glyphs/30/linkedin-2--v1.png">
                            </a>
                            <a href="#"  style="margin-left:10px;">
                                <img style="background-color:#fff;" width="18" height="18" src="https://img.icons8.com/ios/50/twitterx--v2.png">
                            </a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

    </table>

</td>
</tr>
</table>

</body>
</html>
HTML;
        // ✅ Send
        $mail->send();

        echo "Thank you! We will get back to you soon.";

    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}
?>