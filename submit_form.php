<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }
    $to = "faezdaboel@gmail.com";
    $subject = "New Contact Form Submission";
    $body = "Name: $name\nEmail: $email\nMessage: $message";

    // Send email
    if (mail($to, $subject, $body)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send message.";
    }
} else {
    header("Location: contact.html");
    exit();
}
