# Gigs & Goals 🏟️🎸

[![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com)
[![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net)
[![SQLite](https://img.shields.io/badge/SQLite-07405E?style=for-the-badge&logo=sqlite&logoColor=white)](https://www.sqlite.org)

> **[🇺🇸 Read in English](README.md) | [🇪🇸 Leer en Español](README.es.md)**

🚀 **Live Demo:** [https://gigs-and-goals-dc5k06t2i-kaaduarturo4-8233s-projects.vercel.app](https://gigs-and-goals-dc5k06t2i-kaaduarturo4-8233s-projects.vercel.app)

> [!NOTE]
> **Aviso sobre Persistencia:** Esta demo utiliza SQLite en un entorno Serverless (Vercel). Cualquier dato que crees (nuevos tickets) se **reseteará** cuando el servidor se duerma o se vuelva a desplegar. Para un entorno de producción real, se requeriría una base de datos remota (MySQL/PostgreSQL).

**Gigs & Goals** es una línea de tiempo personal que conecta tus recuerdos musicales con tu pasión por el fútbol. Responde a la pregunta: *"¿Qué estaba haciendo mi equipo cuando vi a esta banda?"*

## Capturas de Pantalla

| Inicio | Mi Línea de Tiempo | Crear Recuerdo |
|:---:|:---:|:---:|
| ![Home](public/screenshots/home.png) | ![Timeline](public/screenshots/timeline.png) | ![Create](public/screenshots/create.png) |

## Características

- **Vista de Línea de Tiempo**: Historial visual de conciertos asistidos, ordenados por fecha.
- **Memoria Contextual**:
  - **Detalles del Concierto**: Artista, Lugar, Fecha.
  - **Contexto Futbolístico**: Registra el estado de tu equipo (ej. "Peleando el título") y resultados del partido de ese día.
  - **Vibe Cultural**: Agrega tweets, anécdotas o el clima para capturar la "atmósfera" del día.
- **UI Premium**: Estética Dark Mode con acentos neón usando TailwindCSS.
- **Funcionalidad CRUD**: Sistema completo de Crear, Leer, Actualizar y Borrar tus recuerdos.

## Instalación y Desarrollo Local

1. **Clonar el repositorio**
   ```bash
   git clone <your-repo-url>
   cd gigs-and-goals
   ```

2. **Instalar Dependencias**
   ```bash
   composer install
   npm install
   ```

3. **Configurar Entorno**
   ```bash
   cp .env.example .env
   php artisan key:generate
   touch database/database.sqlite
   php artisan migrate
   ```

4. **Ejecutar Aplicación**
   ```bash
   npm run dev
   php artisan serve
   ```
   Visita `http://127.0.0.1:8000`


