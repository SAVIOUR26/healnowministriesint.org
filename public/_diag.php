<?php
// Temporary diagnostic script — deployed to isolate the cause of the 500s.
// Safe to delete once the real cause is found; it doesn't touch bootstrap.php's
// normal execution path other than requiring it inside a try/catch.
error_reporting(E_ALL);
ini_set('display_errors', '1');

header('Content-Type: text/plain');

echo "PHP version: " . PHP_VERSION . "\n";
echo "SAPI: " . php_sapi_name() . "\n";
echo "Server software: " . ($_SERVER['SERVER_SOFTWARE'] ?? 'unknown') . "\n";
echo "Doc root: " . ($_SERVER['DOCUMENT_ROOT'] ?? 'unknown') . "\n";
echo "Script: " . __FILE__ . "\n\n";

echo "--- Attempting to require bootstrap.php ---\n";
try {
    require __DIR__ . '/../bootstrap.php';
    echo "bootstrap.php loaded OK\n";
    echo "site_content() OK: " . (function_exists('site_content') ? 'function exists' : 'MISSING') . "\n";
    $site = site_content();
    echo "site name: " . ($site['name'] ?? 'MISSING') . "\n";
} catch (\Throwable $e) {
    echo "CAUGHT ERROR: " . get_class($e) . ": " . $e->getMessage() . "\n";
    echo "  in " . $e->getFile() . ":" . $e->getLine() . "\n";
}

echo "\n--- Attempting to render the home page content ---\n";
try {
    $page = page_content('home');
    echo "page_content('home') OK\n";
} catch (\Throwable $e) {
    echo "CAUGHT ERROR: " . get_class($e) . ": " . $e->getMessage() . "\n";
    echo "  in " . $e->getFile() . ":" . $e->getLine() . "\n";
}
