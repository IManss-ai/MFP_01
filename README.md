# 📓 One Line Per Day

> *A minimalist daily diary — one sentence at a time.*

---

## What is this?

**One Line Per Day** is a beautifully simple journaling app. Every day, you write exactly **one sentence** about your life. Nothing more, nothing less.

Over time, these single lines stack up into a quiet, honest record of your days — a scroll of life moments, stripped of noise and distraction.

No word counts. No pressure. Just one line.

---

## ✨ Features

- **One sentence per day** — the constraint is the feature
- **Memory Lane** — scroll back through every entry, oldest to newest
- **Gap detection** — days you skipped are shown, so the record stays honest
- **Minimal UI** — dark, warm, distraction-free design
- **Mobile friendly** — works beautifully on any screen size
- **No accounts, no tracking** — just you and your words

---

## 🛠 Tech Stack

| Layer | Technology |
|-------|-----------|
| Backend | PHP 8.x |
| Database | MySQL 8.x |
| Web Server | Apache |
| Frontend | HTML5, CSS3, Vanilla JavaScript |
| Environment | LAMP Stack |

---

## 📸 Screenshots

> _Screenshots coming soon._

<!-- Add your screenshots here:
![Homepage](screenshots/homepage.png)
![Memory Lane](screenshots/memory-lane.png)
-->

---

## 🚀 Getting Started

### Prerequisites

- A local LAMP stack (Linux + Apache + MySQL + PHP)
- PHP 8.x
- MySQL 8.x

### Installation

**1. Clone the repository**

```bash
git clone https://github.com/your-username/one-line-per-day.git
cd one-line-per-day
```

**2. Set up the database**

Log into MySQL and run the setup script:

```bash
mysql -u root -p < setup-database.sql
```

This creates the `one_line_per_day` database and the `entries` table.

**3. Configure the database connection**

Open `includes/db.php` and update your credentials if needed:

```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'one_line_per_day');
define('DB_USER', 'root');
define('DB_PASS', 'your_password');
```

**4. Point Apache to the project**

Place the project folder inside your web root (e.g. `/var/www/html/`) and visit:

```
http://localhost/one-line-per-day/
```

**5. Start writing**

Open the app in your browser and write your first line. That's it.

---

## 📁 Project Structure

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

## 👤 Author

**Mansur**

Built with simplicity in mind — one line at a time.

---

<p align="center">
  <em>"The secret of getting ahead is getting started."</em>
</p>
