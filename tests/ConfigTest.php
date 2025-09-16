<?php
use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase {
    protected function setUp(): void {
        require_once __DIR__ . '/../includes/config.php';
    }

    public function testGetFrontPageTrainingFiltersContent() {
        global $content_items;
        
        // Mock content items
        $content_items = [
            ['id' => 1, 'category' => 'front-page-training'],
            ['id' => 2, 'category' => 'other'],
            ['id' => 3, 'category' => 'front-page-training']
        ];

        $result = getFrontPageTraining();
        $this->assertCount(2, $result);
        $this->assertEquals(1, $result[0]['id']);
        $this->assertEquals(3, $result[1]['id']);
    }

    public function testGetContentByIdFindsValidId() {
        global $content_items;
        
        $content_items = [
            ['id' => 'training-101', 'title' => 'Test Training'],
            ['id' => 'about-us', 'title' => 'About']
        ];

        $result = getContentById('training-101');
        $this->assertEquals('Test Training', $result['title']);
    }

    public function testGetContentByIdReturnsNullForInvalidId() {
        global $content_items;
        $content_items = [['id' => 'valid-id']];
        
        $result = getContentById('invalid-id');
        $this->assertNull($result);
    }
}
