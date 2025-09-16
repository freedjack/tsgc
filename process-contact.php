<?php

require_once __DIR__ . '/includes/functions.php';

// Simple form processing - in production you'd want more robust validation and email sending
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate form using extracted function
    [$errors, $fields] = validate_contact_form($_POST);
    
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
