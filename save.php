<?php
// save.php — Receives the form POST and saves today's entry.
// After saving, it redirects back to the homepage.

require_once 'includes/db.php';
require_once 'includes/functions.php';

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$sentence = trim($_POST['sentence'] ?? '');

// Basic validation
if ($sentence === '') {
    header('Location: index.php?error=empty');
    exit;
}

// Try to save — save_entry() returns false if today already has an entry
$saved = save_entry($pdo, $sentence);

if ($saved) {
    header('Location: index.php?saved=1');
} else {
    header('Location: index.php?error=duplicate');
}
exit;
