# One Line Per Day

A journaling app with a single rule: one sentence per day.

---

## What it does

Each day, the homepage presents a text input. You write one sentence and submit it. Once saved, the entry is locked for that day and the input is replaced with the saved line. Over time, entries accumulate into a plain chronological record.

The Memory Lane page lists all past entries from oldest to newest. Days with no entry are shown explicitly, so gaps in the record are visible rather than hidden.

There are no user accounts and no external tracking.

---

## Features

- One sentence per day, enforced by the interface
- Memory Lane: a full list of past entries, oldest to newest
- Gap detection: skipped days appear in the record
- Dark minimal UI, no accounts, no tracking
- Responsive — works on mobile

---

## Tech stack

| Layer       | Technology                      |
|-------------|---------------------------------|
| Backend     | PHP 8.x                         |
| Database    | MySQL 8.x                       |
| Web server  | Apache                          |
| Frontend    | HTML5, CSS3, Vanilla JavaScript |
| Environment | LAMP stack                      |

---

## Screenshots

Screenshots coming soon.

---

## Setup

### Prerequisites

- PHP 8.x
- MySQL 8.x
- Apache (local LAMP stack)

### Installation

**1. Clone the repository**

```bash
git clone https://github.com/your-username/one-line-per-day.git
cd one-line-per-day
```

**2. Initialize the database**

```bash
mysql -u root -p < setup-database.sql
```

This creates the `one_line_per_day` database and the `entries` table.

**3. Configure the database connection**

Open `includes/db.php` and set your credentials:

```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'one_line_per_day');
define('DB_USER', 'root');
define('DB_PASS', 'your_password');
```

**4. Serve the project**

Place the project folder in your web root (e.g. `/var/www/html/`) and open:

```
http://localhost/one-line-per-day/
```

---

## Project structure

```
one-line-per-day/
├── index.php              # Homepage — today's input or entry
├── memory-lane.php        # All past entries
├── save.php               # POST handler for saving entries
├── setup-database.sql     # Run once to initialize the database
├── includes/
│   ├── db.php             # PDO database connection
│   └── functions.php      # Core functions
└── assets/
    └── css/
        └── style.css      # All styles
```

---

## Author

Mansur
