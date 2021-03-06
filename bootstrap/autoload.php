<?php

// Define minimum supported PHP version
define('PARABOL', '7.3.0');

// Check PHP version
if (version_compare(PHP_VERSION, PARABOL, '<')) {
    $message = 'Error: Ask your hosting provider to use PHP ' . PARABOL . ' or higher for HTTP, CLI, and php command.' . PHP_EOL . PHP_EOL . 'Current PHP version: ' . PHP_VERSION . PHP_EOL;

    if (defined('STDOUT')) {
        fwrite(STDOUT, $message);
    } else {
        echo($message);
    }

    die(1);
}

define('LARAVEL_START', microtime(true));

// Load composer for core
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../helpers.php';

// Load composer for modules
foreach (glob(__DIR__ . '/../modules/*') as $folder) {
    $autoload = $folder . '/vendor/autoload.php';

    if (!is_file($autoload)) {
        continue;
    }

    require $autoload;
}
