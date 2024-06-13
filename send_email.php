<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    // Validate email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Email content
        $to = "justin.wold88@gmail.com"; // Replace with your email
        $headers = "From: $name <$email>\r\n";
        $email_subject = "Contact Form Submission: $subject";
        $email_body = "You have received a new message from $name.\n\n".
                      "Here are the details:\n".
                      "Name: $name\n".
                      "Email: $email\n".
                      "Subject: $subject\n".
                      "Message:\n$message";

        // Send email
        if (mail($to, $email_subject, $email_body, $headers)) {
            echo "Message sent successfully!";
        } else {
            echo "Message failed to send.";
        }
    } else {
        echo "Invalid email address.";
    }
} else {
    echo "Invalid request.";
}
?>
