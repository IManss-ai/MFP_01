<?php
// functions.php — Shared helper functions

/**
 * Get today's entry from the database.
 * Returns the row as an array, or null if nothing saved today.
 */
function get_todays_entry(PDO $pdo): ?array {
    $stmt = $pdo->prepare('SELECT * FROM entries WHERE entry_date = CURDATE()');
    $stmt->execute();
    $row = $stmt->fetch();
    return $row ?: null;
}

/**
 * Save a new entry for today.
 * Returns true on success, false if today already has an entry.
 */
function save_entry(PDO $pdo, string $sentence): bool {
    try {
        $stmt = $pdo->prepare(
            'INSERT INTO entries (entry_date, sentence) VALUES (CURDATE(), ?)'
        );
        $stmt->execute([trim($sentence)]);
        return true;
    } catch (PDOException $e) {
        // UNIQUE constraint violation = entry already exists for today
        if ($e->getCode() === '23000') {
            return false;
        }
        throw $e; // re-throw unexpected errors
    }
}

/**
 * Get all entries ordered by date descending (newest first).
 * Returns an associative array keyed by date string 'YYYY-MM-DD'.
 */
function get_all_entries(PDO $pdo): array {
    $stmt = $pdo->query('SELECT * FROM entries ORDER BY entry_date DESC');
    $rows = $stmt->fetchAll();
    $keyed = [];
    foreach ($rows as $row) {
        $keyed[$row['entry_date']] = $row;
    }
    return $keyed;
}

/**
 * Format a date string like '2026-03-14' into a pretty label.
 * Example output: "Friday, March 14, 2026"
 */
function format_date(string $dateStr): string {
    $ts = strtotime($dateStr);
    return date('l, F j, Y', $ts);
}
