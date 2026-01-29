<?php
// Mock Request
$_SERVER['REQUEST_METHOD'] = 'GET';
$_SERVER['REQUEST_URI'] = '/';

// Capture output
ob_start();
require __DIR__ . '/../public/index.php';
$output = ob_get_clean();

echo "Route / Output: " . $output . "\n";

// Test DB Route
$_SERVER['REQUEST_URI'] = '/test-db';
ob_start();
// We need to re-instantiate or reset router if it was singleton, but here it's new every request in index.php
// actually index.php does everything. requiring it again might double load things or fail if classes strictly declared.
// So let's just make a separate test execution.
echo "Manually testing DB Connection...\n";
require_once __DIR__ . '/../app/Core/Database.php';
require_once __DIR__ . '/../app/Helpers/helpers.php';
// Load env manually for this test snippet if index.php didn't persist (it won't in this scope if we just mocked output)
// Actually, let's just use the helper and class.
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

try {
    $db = \App\Core\Database::getInstance()->getConnection();
    echo "DB Connection: Success\n";
} catch (Exception $e) {
    echo "DB Connection: Failed - " . $e->getMessage() . "\n";
}
