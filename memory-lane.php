<?php
// memory-lane.php — Shows all past entries, newest first.
// Gap days (missed days) are shown as empty markers so you "feel" the silence.

require_once 'includes/db.php';
require_once 'includes/functions.php';

// Get all entries as an array keyed by 'YYYY-MM-DD'
$entries = get_all_entries($pdo);

// Find the earliest entry date to know how far back to go
$earliest = empty($entries) ? date('Y-m-d') : array_key_last($entries);

// We'll walk from today back to the earliest entry date
$start = new DateTime(date('Y-m-d'));
$end   = new DateTime($earliest);
$interval = new DateInterval('P1D'); // 1 day step

// Build a list of all dates from today back to earliest
$date_range = new DatePeriod($end, $interval, $start->modify('+1 day'));
$all_dates = [];
foreach ($date_range as $dt) {
    $all_dates[] = $dt->format('Y-m-d');
}
// Reverse so newest is first
$all_dates = array_reverse($all_dates);

$total_entries = count($entries);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memory Lane — One Line Per Day</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">

        <header class="memory-header">
            <p class="site-title"><a href="index.php" style="color:inherit;text-decoration:none;">One Line Per Day</a></p>
            <h1>Memory Lane</h1>
            <p><?= $total_entries === 1 ? '1 entry' : $total_entries . ' entries' ?></p>
        </header>

        <?php if (empty($entries)): ?>
            <p style="color:var(--muted);text-align:center;font-style:italic;">
                No entries yet. Go write your first line.
            </p>
            <div style="text-align:center;margin-top:2rem;">
                <a href="index.php" class="nav-link">&larr; Back to today</a>
            </div>

        <?php else: ?>

            <ul class="memory-list">
                <?php foreach ($all_dates as $date): ?>
                    <?php if (isset($entries[$date])): ?>
                        <!-- Real entry -->
                        <li class="memory-item">
                            <p class="item-date"><?= htmlspecialchars(format_date($date)) ?></p>
                            <p class="item-sentence"><?= htmlspecialchars($entries[$date]['sentence']) ?></p>
                        </li>
                    <?php else: ?>
                        <!-- Gap day -->
                        <li class="memory-item gap">
                            <p class="item-date"><?= htmlspecialchars(format_date($date)) ?></p>
                            <p class="item-sentence">&mdash;</p>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>

            <div style="margin-top:3rem;">
                <a href="index.php" class="nav-link">&larr; Back to today</a>
            </div>

        <?php endif; ?>

    </div>
</body>
</html>
