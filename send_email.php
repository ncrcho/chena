<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Send email
    $to = "ncrcho@gmail.com";
    $subject = "New Contact Form Submission";
    $body = "Name: " . $name . "\n";
    $body .= "Email: " . $email . "\n";
    $body .= "Message: " . $message;
    $headers = "From: " . $email;

    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you for contacting us! We will get back to you shortly.";
    } else {
        echo "Oops! Something went wrong. Please try again.";
    }
}
?>
