# CLAUDE.md — One Line Per Day

## Project Overview
A minimalist daily diary web app. Each day, the user writes exactly one sentence.
Over time it builds into a scroll of life moments — one line at a time.

## Tech Stack
- **Backend:** PHP 8.x
- **Database:** MySQL 8.x
- **Web Server:** Apache (local LAMP stack)
- **Frontend:** Plain HTML, CSS, vanilla JavaScript (no frameworks)

## Project Root
`/var/www/html/my-first-app/`

## Database
- **Name:** `one_line_per_day`
- **Main table:** `entries` (id, entry_date, sentence, created_at)
- Connect via: `includes/db.php`

## Key Pages
| File | Purpose |
|------|---------|
| `index.php` | Homepage — today's input or today's entry |
| `memory-lane.php` | All past entries, scrolling back in time |
| `save.php` | Handles POST to save a new entry |

## Design Principles
- Dark background, warm soft text, elegant font (serif or refined sans)
- No clutter — one thing on screen at a time
- Mobile friendly
- Never show ads, nav overload, or distractions

## Coding Conventions
- All DB queries go through PDO (prepared statements only — no raw SQL with user input)
- PHP files use `require_once 'includes/db.php'` for database connection
- CSS lives in `assets/css/style.css`
- Keep functions small and named clearly
- Comment any logic that isn't obvious

## Common Commands
```bash
# Restart Apache
sudo service apache2 restart

# MySQL login
mysql -u root -p

# Check Apache error log
sudo tail -f /var/log/apache2/error.log
```
