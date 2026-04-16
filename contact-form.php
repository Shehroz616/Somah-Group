<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Your email
    $youremail = "ta474232@mail.com";

    // Sanitize inputs
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $company = htmlspecialchars(trim($_POST['company'] ?? ''));
    $message = htmlspecialchars(trim($_POST['message'] ?? ''));
    $topic = htmlspecialchars(trim($_POST['topic'] ?? ''));

    // Validation
    if (empty($name) || empty($email) || empty($company) || empty($message)) {
        die("Please fill all required fields.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    // Email body
    $body = "New Contact Form Submission:\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Company: $company\n";
    $body .= "Inquiry Type: $topic\n";
    $body .= "Message:\n$message\n";

    // Headers
    $headers = "From: $youremail\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send mail
    if (mail($youremail, "New Inquiry from Website", $body, $headers)) {
        echo "<h2>Thank you! We will get back to you soon.</h2>";
    } else {
        echo "<h2>Something went wrong. Please try again.</h2>";
    }
}
?>