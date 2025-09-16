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

        ob_start();
        include __DIR__ . '/../process-contact.php';
        $output = ob_get_clean();

        $headers = xdebug_get_headers();
        $this->assertStringContainsString('Location: contact.php?success=1', $headers[0]);
        
        // Verify log entry
        $log = file_get_contents('contact_log.txt');
        $this->assertStringContainsString('Test User (valid@test.com)', $log);
    }
}
