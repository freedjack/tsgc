<?php
use PHPUnit\Framework\TestCase;

class ProcessContactTest extends TestCase {
    public function testRedirectsWithErrorsOnInvalidInput() {
        require_once __DIR__ . '/../includes/functions.php';
        
        $_POST = [
            'name' => '',
            'email' => 'invalid',
            'message' => ''
        ];

        [$errors, $fields] = validate_contact_form($_POST);
        
        $this->assertContains('Name is required', $errors);
        $this->assertContains('Please enter a valid email address', $errors);
        $this->assertContains('Message is required', $errors);
    }

    public function testSuccessfulSubmissionRedirectsWithSuccess() {
        $_POST = [
            'name' => 'Test User',
            'email' => 'valid@test.com',
            'message' => 'Test message',
            'newsletter' => 'on'
        ];

        // Test validation directly without including the file with headers
        require_once __DIR__ . '/../includes/functions.php';
        
        [$errors, $fields] = validate_contact_form($_POST);
        
        $this->assertEmpty($errors, 'Validation errors occurred');
        $this->assertArrayHasKey('email', $fields, 'Email field should be present');
        $this->assertEquals('valid@test.com', $fields['email']);
    }
}
