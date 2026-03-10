<?php

// Test middleware functionality
require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

$kernel->bootstrap();

echo "Testing Middleware Configuration:\n";
echo "===============================\n";

// Check if middleware aliases are registered
$routeManager = app('router');
$middlewareAliases = $routeManager->getMiddleware();

echo "Admin Middleware: " . ($middlewareAliases['admin'] ?? 'NOT FOUND') . "\n";
echo "Customer Middleware: " . ($middlewareAliases['customer'] ?? 'NOT FOUND') . "\n";
echo "Vendor Middleware: " . ($middlewareAliases['vendor'] ?? 'NOT FOUND') . "\n";

echo "\nAll middleware aliases should be properly registered.\n";
echo "Protected routes should redirect to login if user is not authenticated.\n";
