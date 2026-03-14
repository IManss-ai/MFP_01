<?php
// db.php — Database connection
// Every page that needs the database does: require_once 'includes/db.php';
// This gives them the $pdo variable they can use to run queries.

define('DB_HOST', 'localhost');
define('DB_NAME', 'one_line_per_day');
define('DB_USER', 'root');       // Change this if your MySQL user is different
define('DB_PASS','Root1234!');           // Change this to your MySQL password

try {
    $pdo = new PDO(
        'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4',
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
} catch (PDOException $e) {
    // Show a friendly error — never expose raw DB errors to users in production
    die('<p style="font-family:sans-serif;color:#c00;padding:2rem;">
        Could not connect to the database.<br>
        Check your credentials in <code>includes/db.php</code>.<br><br>
        <small>' . htmlspecialchars($e->getMessage()) . '</small>
    </p>');
}
