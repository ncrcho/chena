

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Validate the form fields
    if (empty($name) || empty($email) || empty($message)) {
        echo 'error';
        return;
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'error';
        return;
    }

    // Send email
    $to = "ncrcho@gmail.com";
    $subject = "New Contact Form Submission";
    $body = "Name: " . $name . "\n";
    $body .= "Email: " . $email . "\n";
    $body .= "Message: " . $message;
    $headers = "From: " . $email;


    mail($to, $subject, $body, $headers);

    // if (mail($to, $subject, $body, $headers)) {
    //     echo "success";
    // } else {
    //     echo "error";
    // }
}
?>

