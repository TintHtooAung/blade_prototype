<?php

// Simple autoloader for basic functionality
spl_autoload_register(function ($class) {
    // Convert namespace to file path
    $file = __DIR__ . '/../' . str_replace('\\', '/', $class) . '.php';
    
    if (file_exists($file)) {
        require_once $file;
    }
});
