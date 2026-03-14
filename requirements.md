# Requirements — One Line Per Day

## Core Features

### 1. Daily Entry (Homepage)
- Show today's date prominently
- If no entry exists for today: show a single text input + submit button
- If an entry already exists for today: show the sentence (read-only, no editing)
- One sentence limit — enforced on frontend (maxlength) and backend (validation)

### 2. Memory Lane Page
- Show all past entries in reverse-chronological order (newest first)
- Each row shows: date + the one sentence
- If a day was skipped, show a visible blank/gap so the user "feels" the missing day
- Scroll indefinitely back through time

### 3. Save Entry
- POST handler (`save.php`) receives the sentence
- Validates: not empty, not already saved today
- Saves to MySQL
- Redirects back to homepage

## Rules / Constraints
- One entry per calendar day — enforced at DB level (UNIQUE on `entry_date`)
- No user accounts (single-user local app for now)
- No editing past entries
- No deleting entries from the UI

## Out of Scope (for now)
- User authentication / multiple users
- Rich text or photos
- Export / backup UI
- Mobile app
