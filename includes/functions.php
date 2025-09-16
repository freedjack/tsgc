<?php

function validate_contact_form(array $post): array {
    $fields = [
        'name' => trim($post['name'] ?? ''),
        'email' => trim($post['email'] ?? ''),
        'company' => trim($post['company'] ?? ''),
        'phone' => trim($post['phone'] ?? ''),
        'training_interest' => trim($post['training_interest'] ?? ''),
        'participants' => trim($post['participants'] ?? ''),
        'message' => trim($post['message'] ?? ''),
        'preferred_contact' => $post['preferred_contact'] ?? 'email',
        'newsletter' => isset($post['newsletter']) ? 'Yes' : 'No'
    ];

    $errors = [];
    
    if (empty($fields['name'])) {
        $errors[] = 'Name is required';
    }
    
    if (empty($fields['email'])) {
        $errors[] = 'Email is required';
    } elseif (!filter_var($fields['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address';
    }
    
    if (empty($fields['message'])) {
        $errors[] = 'Message is required';
    }

    return [$errors, $fields];
}
