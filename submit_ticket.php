<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $description = $_POST["description"];
    
    // Set the recipient email address
    $to = "support@kci.net";
    
    // Set the subject of the email
    $email_subject = "Problem Ticket: $subject";
    
    // Compose the email message
    $email_message = "Name: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Subject: $subject\n";
    $email_message .= "Description:\n$description\n";
    
    // Set the headers for the email
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();
    
    // Send the email
    mail($to, $email_subject, $email_message, $headers);
    
    // You can also include additional error handling and success messages.
    // For example:
    if (mail($to, $email_subject, $email_message, $headers)) {
        echo "Thank you for submitting your problem ticket. We will get back to you soon.";
    } else {
        echo "An error occurred. Please try again later.";
    }
}
?>
