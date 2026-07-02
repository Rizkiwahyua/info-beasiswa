<?php

// Setup required directories and files for Vercel serverless
$tmpDir = '/tmp';

// Create storage directories needed by Laravel
$storageDirs = [
    $tmpDir . '/storage/framework/cache/data',
    $tmpDir . '/storage/framework/sessions',
    $tmpDir . '/storage/framework/views',
    $tmpDir . '/storage/logs',
];

foreach ($storageDirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// Create SQLite database if not exists
$dbPath = $tmpDir . '/database.sqlite';
if (!file_exists($dbPath)) {
    touch($dbPath);
}

// Forward Vercel requests to Laravel's public/index.php
require __DIR__ . '/../public/index.php';
