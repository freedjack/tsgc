<?php
require_once 'config.php';

// Simple form processing - in production you'd want more robust validation and email sending
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Basic validation
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $company = trim($_POST['company'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $training_interest = trim($_POST['training_interest'] ?? '');
    $participants = trim($_POST['participants'] ?? '');
    $message = trim($_POST['message'] ?? '');
    $preferred_contact = $_POST['preferred_contact'] ?? 'email';
    $newsletter = isset($_POST['newsletter']) ? 'Yes' : 'No';
    
    $errors = [];
    
    // Validate required fields
    if (empty($name)) {
        $errors[] = 'Name is required';
    }
    
    if (empty($email)) {
        $errors[] = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address';
    }
    
    if (empty($message)) {
        $errors[] = 'Message is required';
    }
    
    if (empty($errors)) {
        // In a real application, you would:
        // 1. Sanitize all inputs
        // 2. Send email using PHPMailer or similar
        // 3. Store in database if needed
        // 4. Send confirmation email to user
        
        // For demo purposes, we'll just redirect with success message
        $success = true;
        
        // You could also log the contact form submission
        $log_entry = date('Y-m-d H:i:s') . " - Contact form submitted by: $name ($email)\n";
        file_put_contents('contact_log.txt', $log_entry, FILE_APPEND | LOCK_EX);
    }
}

// Redirect back to contact page with status
$redirect_url = 'contact.php';
if (!empty($errors)) {
    $redirect_url .= '?error=' . urlencode(implode(', ', $errors));
} elseif (isset($success)) {
    $redirect_url .= '?success=1';
}

header('Location: ' . $redirect_url);
exit;
?>
