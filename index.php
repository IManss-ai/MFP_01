<?php
// index.php — Homepage
// Shows today's date and either:
//   (A) the input form, if no entry saved yet today
//   (B) today's saved sentence, if it already exists

require_once 'includes/db.php';
require_once 'includes/functions.php';

$today_entry = get_todays_entry($pdo);
$today_label = format_date(date('Y-m-d'));

// Pick up any flash messages from redirects
$error = $_GET['error'] ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One Line Per Day</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">

        <header class="site-header">
            <p class="site-title">One Line Per Day</p>
            <h1 class="today-date"><?= htmlspecialchars($today_label) ?></h1>
        </header>

        <?php if ($error === 'empty'): ?>
            <div class="flash error">Please write something before saving.</div>
        <?php elseif ($error === 'duplicate'): ?>
            <div class="flash error">You already saved today's line.</div>
        <?php endif; ?>

        <?php if ($today_entry): ?>
            <!-- STATE B: Entry already written today — show it -->
            <div class="todays-entry">
                <p class="sentence"><?= htmlspecialchars($today_entry['sentence']) ?></p>
                <p class="entry-saved-label">Today's line &mdash; saved</p>
            </div>
            <a href="memory-lane.php" class="nav-link">Memory Lane &rarr;</a>

        <?php else: ?>
            <!-- STATE A: No entry yet — show the input form -->
            <form class="entry-form" action="save.php" method="POST">
                <p class="entry-prompt">Your one line for today</p>
                <textarea
                    class="entry-input"
                    name="sentence"
                    id="entry-textarea"
                    maxlength="500"
                    rows="3"
                    placeholder="One sentence. That's all."
                    autofocus
                ></textarea>
                <span class="char-counter" id="char-counter">0 / 500</span>
                <button type="submit" class="submit-btn">Save this line</button>
            </form>
            <a href="memory-lane.php" class="nav-link">Memory Lane &rarr;</a>

        <?php endif; ?>

    </div>

    <?php if (!$today_entry): ?>
    <script>
        const textarea = document.getElementById('entry-textarea');
        const counter  = document.getElementById('char-counter');
        const MAX = 500;

        textarea.addEventListener('input', function () {
            const len = this.value.length;
            counter.textContent = len + ' / ' + MAX;
            counter.classList.toggle('char-counter--warn',  len >= 400);
            counter.classList.toggle('char-counter--limit', len >= 480);
        });
    </script>
    <?php endif; ?>
</body>
</html>
