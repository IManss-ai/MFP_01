# Design Notes — One Line Per Day

## Mood & Feel
Minimal. Calm. Like opening a quiet journal at the end of the day.
No noise, no distractions, nothing competing for attention.

## Color Palette
| Role | Color | Notes |
|------|-------|-------|
| Background | `#0f0e0d` | Near-black, slightly warm |
| Surface / card | `#1a1917` | Slightly lighter warm dark |
| Primary text | `#e8dcc8` | Warm cream / parchment |
| Muted text | `#7a6f61` | For dates, labels |
| Accent | `#c9a96e` | Warm gold — used sparingly |
| Input border | `#3a342c` | Subtle warm border |
| Input focus | `#c9a96e` | Gold glow on focus |

## Typography
- Body / entries: `'Georgia', serif` — classic, warm, readable
- Dates / labels: `'Courier New', monospace` — structured, journal-like
- Fallback: `serif`

## Layout
- Centered single column, max-width ~600px
- Generous whitespace — breathing room is the design
- Today's date: large, at the top
- Input box: full width, minimal border, soft placeholder text
- Submit button: text-only style, no heavy button chrome

## Homepage States
1. **Empty state** (no entry today): date + input + subtle "write your line" prompt
2. **Written state** (entry exists): date + the sentence in warm text + soft "see all memories" link

## Memory Lane
- Each entry: date (muted, monospace) above sentence (warm, serif)
- Missing days: a thin horizontal line or empty space with just the date in very muted color
- No cards, no borders — just text and whitespace

## Animations
- None heavy — only a gentle fade-in on page load
- Input focus: soft gold border glow transition
