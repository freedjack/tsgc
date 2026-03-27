<?php
if (!function_exists('getContentById')) {
    function getContentById($id) {
        global $content_items;
        foreach ($content_items as $item) {
            if ($item['id'] === $id) {
                return $item;
            }
        }
        return null;
    }
}

if (!function_exists('getFrontPageTraining')) {
    function getFrontPageTraining() {
        global $content_items;
        return array_values(array_filter($content_items, function ($item) {
            return isset($item['category']) && $item['category'] === 'front-page-training';
        }));
    }
}
