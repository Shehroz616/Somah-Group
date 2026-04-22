<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name            = htmlspecialchars(strip_tags($_POST['name']));
    $email           = htmlspecialchars(strip_tags($_POST['email']));
    $company         = htmlspecialchars(strip_tags($_POST['company']));
    $company_turnover = htmlspecialchars(strip_tags($_POST['company_turnover']));
    $message         = htmlspecialchars(strip_tags($_POST['message']));
    $topic           = htmlspecialchars(strip_tags($_POST['topic']));

    $to      = 'admin@somah-group.com';
    $subject = 'Somah Group – New Contact Form Submission';

    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $headers .= "From: Somah Group Website <no-reply@somah-group.com>\r\n";
    $headers .= "Reply-To: $name <$email>\r\n";

    $body = <<<HTML
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Email</title></head>
<body style="margin:0;padding:0;background-color:#f4f4f4;font-family:Arial,sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="background:#f4f4f4;padding:20px 0;">
<tr><td align="center">

    <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff;border-radius:6px;overflow:hidden;">

        <tr>
            <td style="padding:20px;border-bottom:1px solid #e0e0e0;">
                <span style="font-size:22px;font-weight:bold;color:#111;font-family:Georgia,serif;">Somah</span>
                <span style="font-size:22px;color:#111;font-family:Georgia,serif;">Group</span>
            </td>
        </tr>

        <tr>
            <td style="padding:25px;">
                <p style="font-size:12px;color:#888;text-transform:uppercase;letter-spacing:1px;margin-bottom:20px;">
                    New Contact Form Submission
                </p>

                <p style="margin:0 0 10px;">
                    <strong style="font-size:11px;color:#999;">NAME</strong><br>
                    <span style="font-size:15px;color:#222;">$name</span>
                </p>

                <p style="margin:0 0 10px;">
                    <strong style="font-size:11px;color:#999;">EMAIL</strong><br>
                    <a href="mailto:$email" style="font-size:15px;color:#111;text-decoration:none;">$email</a>
                </p>

                <p style="margin:0 0 10px;">
                    <strong style="font-size:11px;color:#999;">COMPANY</strong><br>
                    <span style="font-size:15px;color:#222;">$company</span>
                </p>

                <p style="margin:0 0 10px;">
                    <strong style="font-size:11px;color:#999;">COMPANY TURNOVER</strong><br>
                    <span style="font-size:15px;color:#222;">$company_turnover</span>
                </p>

                <p style="margin:0 0 20px;">
                    <strong style="font-size:11px;color:#999;">INQUIRY TYPE</strong><br>
                    <span style="font-size:15px;color:#222;">$topic</span>
                </p>

                <hr style="border:none;border-top:1px solid #e8e8e8;margin:20px 0;">

                <p style="font-size:11px;color:#999;margin-bottom:8px;"><strong>MESSAGE</strong></p>

                <table width="100%" cellpadding="0" cellspacing="0" style="background:#f9f9f9;border-left:3px solid #111;">
                    <tr>
                        <td style="padding:15px;">
                            <p style="margin:0;font-size:15px;color:#333;line-height:1.6;">$message</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td style="background:#111;color:#888;padding:15px 20px;font-size:12px;">
                © 2024 Somah Group. All rights reserved.
            </td>
        </tr>

    </table>

</td></tr>
</table>

</body>
</html>
HTML;

    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you! We will get back to you soon.";
    } else {
        echo "Error: Mail could not be sent. Please try again later.";
    }
}
?>