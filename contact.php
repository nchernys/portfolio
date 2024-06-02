<?php 
$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
$email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : '';
$message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';

$to = "chernysn@gmail.com";
$subject = "FROM WEB PORTFOLIO";

$headers = "From: noreply@demosite.com" . "\r\n";
$headers .= "CC: somebodyelse@example.com" . "\r\n"; // Use .= to append the CC header.

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email address");
}

$txt = "Name: $name\r\nEmail: $email\r\nRequest: $message";

if (!empty($email)) {
        $success = mail($to, $subject, $message, $headers);
    if ($success) {
                header("Location: success.html");
        exit(); 
    } else {
       
        die("Failed to send email. Please try again later.");
    }
} else {
    
    die("Email address is required.");
}
?>