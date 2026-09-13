# Starshop

Starshop is a space-themed Symfony tutorial application: a tiny starship repair shop that lists ships in a repair queue, shows individual ship pages, and exposes the same data as a JSON API. It was built while following [Cosmic Coding with Symfony 7](https://symfonycasts.com/screencast/symfony) on SymfonyCasts.

This project was completed as part of that course. Certificate of completion: [https://symfonycasts.com/certificates/7428bbbfc155](https://symfonycasts.com/certificates/7428bbbfc155).

The work here is a lean Symfony app that still covers the fundamentals end to end. It starts from a small Flex project, adds third-party packages through recipes, and wires real routes, controllers, and responses. Along the way it uses `bin/console`, Twig templates (including inheritance and partials), the web debug toolbar, a JSON API, custom service objects, PHP enums, and MakerBundle to generate code instead of scaffolding everything by hand.

On the front end, CSS and JavaScript are served with AssetMapper rather than a Node build pipeline. Tailwind CSS styles the UI, Stimulus powers small interactive pieces such as the closeable ship-status aside, and Turbo gives the site a single-page-app feel without writing a separate frontend framework.

## Tech stack

- **PHP** 8.2+
- **Symfony** 7.4 (FrameworkBundle, Flex, Runtime)
- **Twig** for HTML templating
- **AssetMapper** for CSS and JavaScript
- **Tailwind CSS** via `symfonycasts/tailwind-bundle`
- **Stimulus** and **Turbo** (Symfony UX) for JavaScript and SPA-style navigation
- **Serializer** for JSON API responses
- **MakerBundle**, **Web Profiler**, **Monolog** (dev/debug tooling)

There is no database in this project. Starships live in an in-memory `StarshipRepository` service.

## Requirements

- PHP 8.2 or newer
- [Composer](https://getcomposer.org/)
- The [Symfony CLI](https://symfony.com/download) (`symfony` binary)

## Setup

1. Clone the repository and enter the project directory.

2. Install PHP dependencies:

   ```bash
   composer install
   ```

   Composer also runs Flex recipes, clears the cache, and installs the importmap assets.

3. Create a `.env` file in the project root (it is not committed):

   ```env
   APP_ENV=dev
   APP_SECRET=change-me-to-a-random-string
   DEFAULT_URI=http://localhost
   ```

4. Build Tailwind CSS once (or watch it while you work — see below):

   ```bash
   php bin/console tailwind:build
   ```

## Start the app with Symfony Serve

From the project root:

```bash
symfony serve
```

The CLI starts a local web server (usually at `http://127.0.0.1:8000`) and prints the URL. Open that address in your browser.

Useful variants:

```bash
# Start in the background
symfony serve -d

# Open the app in your browser
symfony open:local

# Follow logs for a background server
symfony server:log

# Stop a background server
symfony server:stop
```

`symfony serve` is an alias of `symfony server:start`.

While developing styles, run Tailwind in watch mode in a second terminal:

```bash
php bin/console tailwind:build --watch
```

## What you can try

| URL | What it does |
| --- | --- |
| `/` | Homepage: ship repair queue |
| `/starships/{id}` | Starship detail page (for example `/starships/1`) |
| `/api/starships` | JSON collection of ships |
| `/api/starships/{id}` | JSON for a single ship |

In the `dev` environment, the web debug toolbar appears at the bottom of HTML pages.

## Course

[Cosmic Coding with Symfony 7](https://symfonycasts.com/screencast/symfony) — SymfonyCasts, taught by Ryan Weaver.
