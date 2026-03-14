-- One Line Per Day — Database Setup
-- Run this once to create the database and table.
--
-- HOW TO RUN:
--   mysql -u root -p < setup-database.sql
-- OR paste into phpMyAdmin's SQL tab.

CREATE DATABASE IF NOT EXISTS one_line_per_day
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE one_line_per_day;

CREATE TABLE IF NOT EXISTS entries (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    entry_date  DATE         NOT NULL UNIQUE,
    sentence    VARCHAR(500) NOT NULL,
    created_at  TIMESTAMP    DEFAULT CURRENT_TIMESTAMP
);

-- Optional: insert a sample entry so Memory Lane isn't empty
-- INSERT INTO entries (entry_date, sentence)
-- VALUES (CURDATE() - INTERVAL 1 DAY, 'Yesterday was the day before today.');
