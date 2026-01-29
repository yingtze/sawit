<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Database;

// Load environment
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Start session if needed (not necessary for CLI but harmless)
if (session_status() === PHP_SESSION_NONE) {
    @session_start();
}

try {
    $pdo = Database::getInstance()->getConnection();

    $stmt = $pdo->query("SELECT COUNT(*) AS cnt FROM users");
    $count = $stmt->fetch();
    echo "users_count: " . ($count['cnt'] ?? '0') . PHP_EOL;

    $stmt = $pdo->query("SELECT id, username, created_at FROM users LIMIT 5");
    $rows = $stmt->fetchAll();
    if ($rows) {
        foreach ($rows as $r) {
            echo "- {$r['id']} | {$r['username']} | {$r['created_at']}" . PHP_EOL;
        }
    } else {
        echo "no rows returned" . PHP_EOL;
    }
} catch (Throwable $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
    exit(1);
}
