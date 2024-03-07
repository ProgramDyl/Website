<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];

    // Validate input (check for empty fields, etc.)
    if (empty($firstname) || empty($lastname) || empty($email) || empty($subject)) {

        // Handle validation errors (e.g., show an error message)
        // You can redirect back to the form page with an error message
        header('Location: index.html?error=Please fill in all fields.');

        exit; // Stop further execution
    }

    // Sanitize input (optional, but recommended)
    // Example: $firstname = filter_var($firstname, FILTER_SANITIZE_STRING);

    // Send an email (replace with your actual recipient email)
    $recipient = 'dylancunninghamdev@gmail.com';
    $message = "Name: $firstname $lastname\nEmail: $email\nMessage: $subject";
    mail($recipient, 'New contact form submission', $message);

    // Redirect back to the form page with a success message
    header('Location: index.html?message=Message sent successfully.');
    exit;
} 
?>
