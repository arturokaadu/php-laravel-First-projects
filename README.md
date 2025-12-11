# Gigs & Goals 🏟️🎸

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![SQLite](https://img.shields.io/badge/SQLite-07405E?style=for-the-badge&logo=sqlite&logoColor=white)

**Gigs & Goals** is a personal timeline application that connects your musical memories with your passion for football. It answers the question: *"What was my team doing when I was watching this band?"*

## Features

- **Timeline View**: Visual history of concerts attended, ordered by date.
- **Contextual Memory**:
  - **Gig Details**: Artist, Venue, Date.
  - **Football Context**: Log your team's status (e.g., "Fighting for the title") and match results from that day.
  - **Cultural Vibe**: Add tweets, anecdotes, or weather details to capture the "atmosphere" of the day.
- **Premium UI**: Dark mode aesthetic with neon accents using TailwindCSS.
- **CRUD Functionality**: Fully functional Create, Read, Update, delete system for your memories.

## Installation & Local Development

1. **Clone the repository**
   ```bash
   git clone <your-repo-url>
   cd gigs-and-goals
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Setup Environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   touch database/database.sqlite
   php artisan migrate
   ```

4. **Run Application**
   ```bash
   npm run dev
   php artisan serve
   ```
   Visit `http://127.0.0.1:8000`

## Deployment (Vercel)

This project is ready for Vercel deployment, but note that **SQLite databases are ephemeral** on serverless platforms like Vercel (changes won't persist after redeploys or cold starts). For a permanent production app, switch to a remote MySQL/PostgreSQL database (like Vercel Postgres, Supabase, or PlanetScale).

### Steps to Deploy
1. Upload this code to GitHub.
2. Import the project in Vercel.
3. Vercel should automatically detect Laravel. If not, ensure `vercel.json` is present.
4. Add Environment Variables in Vercel (APP_KEY, etc).

