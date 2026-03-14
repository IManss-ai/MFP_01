# Architecture — One Line Per Day

## Page Map

```
Browser
  │
  ├── index.php          ← Homepage (today's entry or input)
  │     └── POST ──────► save.php ──► redirect back to index.php
  │
  └── memory-lane.php    ← All past entries, scrolling back in time
```

## File Structure

```
my-first-app/
├── CLAUDE.md
├── requirements.md
├── design-notes.md
├── architecture.md
│
├── index.php              ← Homepage
├── memory-lane.php        ← Memory Lane page
├── save.php               ← Form POST handler
│
├── includes/
│   ├── db.php             ← PDO database connection (shared by all pages)
│   └── functions.php      ← Shared helper functions
│
└── assets/
    └── css/
        └── style.css      ← All styles
```

## Database: `one_line_per_day`

### Table: `entries`

| Column | Type | Notes |
|--------|------|-------|
| `id` | INT, AUTO_INCREMENT, PRIMARY KEY | Unique row ID |
| `entry_date` | DATE, UNIQUE | One row per calendar day |
| `sentence` | VARCHAR(500) | The one line |
| `created_at` | TIMESTAMP, DEFAULT NOW() | When it was saved |

### Key Constraints
- `UNIQUE(entry_date)` — prevents double entries for the same day
- `sentence` is required (NOT NULL)

### Example Rows
```
id | entry_date  | sentence                                      | created_at
---+-------------+-----------------------------------------------+-------------------
1  | 2026-03-10  | Watched the rain and felt unexpectedly fine.  | 2026-03-10 21:03
2  | 2026-03-12  | Pizza for dinner, good call.                  | 2026-03-12 19:47
3  | 2026-03-14  | Started building my first web app today.      | 2026-03-14 10:15
```
*(Notice 2026-03-11 is missing — a gap day)*

## Data Flow

### Saving an entry
1. User types a sentence on `index.php`
2. Form POSTs to `save.php`
3. `save.php` validates (not empty, no entry today)
4. Inserts into `entries` table using PDO prepared statement
5. Redirects to `index.php`

### Loading Memory Lane
1. `memory-lane.php` queries all entries ORDER BY date DESC
2. PHP loops from today backward, day by day
3. If a date has an entry → show it
4. If a date has no entry → show a gap marker
