<?php
$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
$email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : '';
$request = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';

$to = "chernysn@gmail.com";
$subject = "FROM WEB DEV PAGE";

$headers = "From: noreply@demosite.com" . "\r\n" .
            "CC: somebodyelse@example.com";

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email address");
}

$txt = "Name: $name\r\nEmail: $email\r\nRequest: $request";

if(!empty($email)) {
    $additional_headers = "-f noreply@demosite.com"; 
    mail($to, $subject, $txt, $headers, $additional_headers);
}

// Redirect after processing
header("Location: index.html");
exit(); 