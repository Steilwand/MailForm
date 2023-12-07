<?php

//For debugging errors with the mailservice
/*
error_reporting(E_ALL);
ini_set('display_errors', 1); */

if (isset($_POST["submit"])) {
    // Form validation
    if (empty($_POST["name"]) || empty($_POST["subject"]) || empty($_POST["mail"]) || empty($_POST["message"])) {
        // Handle empty fields, you can customize this based on your needs
        header("Location: index.php?error=emptyfields");
        exit();
    }

    $name = $_POST["name"];
    $subject = $_POST["subject"];
    $mailFrom = $_POST["mail"];
    $message = $_POST["message"];

    // Sanitize and validate email address
    if (!filter_var($mailFrom, FILTER_VALIDATE_EMAIL)) {
        // Handle invalid email, you can customize this based on your needs
        header("Location: index.php?error=invalidemail");
        exit();
    }

    $mailTo = "YOUR MAIL";
    $headers = "From: " . $mailFrom;
    $txt = "You have received an email via your website from " . $name . ".\n\n" . $message;

    // Send email
    if (mail($mailTo, $subject, $txt, $headers)) {
        // Email sent successfully
        header("Location: mailSent.php");
        exit();
    } else {
        // Email sending failed
        header("Location: index.php?mailsend=error&reason=" . error_get_last()['message']);
        exit();
    }
}
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail was sent to your mailadress</title>
</head>
<body>
    <p>
        nice job, you should have somehing in your inbox!
    </p>
</body>
</html>