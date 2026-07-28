# Starter SCSS — классическая WP-тема на Vite

Стартовая сборка: Vite (HMR прямо поверх PHP) + SCSS/BEM + Alpine.js + Docker Compose + заготовка под ACF Pro.

## Требования

- Docker Desktop
- Node.js 20+
- Composer 2+

## Быстрый старт

```bash
cp .env.example .env
docker compose up -d
```

Дождитесь в логах `docker compose logs wp-cli` строки `Done.` — WordPress установлен, тема активирована, сайт доступен на http://localhost:8080 (админка: http://localhost:8080/wp-admin, admin/admin по умолчанию — поменяйте в `.env` до первого запуска).

```bash
cd theme
composer install
npm install
npm run dev
```

Откройте http://localhost:8080 — правки в `src/scss/**` и `src/js/**` применяются без перезагрузки страницы.

## Продакшен-сборка

```bash
cd theme
npm run build
```

Собирает `dist/` + `manifest.json`. `dist/` не коммитится — собирайте на этапе деплоя (аналогично тому, как `/app` не коммитится в текущих gulp-проектах).

## ACF Pro

См. `plugins/README.md` — плагин платный, кладётся вручную (лицензия у вас). Хелперы под ACF уже готовы в `theme/inc/acf.php` — options page `theme-settings` и обёртка `theme_field()`.

## Alpine.js: интерактивность прямо в PHP-шаблонах

`src/js/main.js` инициализирует Alpine (`window.Alpine = Alpine; Alpine.start()`) — дальше директивы (`x-data`, `@click`, `:class` и т.д.) пишутся прямо в PHP-шаблонах, без отдельных JS-обработчиков. Пример — мобильное меню в `header.php`:

```php
<header class="site-header" x-data="{ navOpen: false }">
	<button type="button" class="site-header__burger" @click="navOpen = !navOpen">...</button>
	<nav class="site-header__nav" :class="{ 'site-header__nav--open': navOpen }">...</nav>
</header>
```

BEM-классы отвечают за вид (`.site-header__nav--open` описан в SCSS), Alpine — только за состояние `navOpen`.

## Структура

```
theme/
├── style.css, functions.php, index.php, header.php, footer.php, page.php, single.php
├── template-parts/content.php
├── inc/vite.php       — мост Vite ↔ WordPress (kucrut/vite-for-wp)
├── inc/acf.php         — ACF options page + theme_field()
└── src/
    ├── scss/            — settings/base/components, BEM
    └── js/main.js        — инициализация Alpine.js
```

## Команды

- `npm run dev` — Vite dev-сервер с HMR
- `npm run build` — прод-сборка
- `npm run stylelint` / `npm run stylelint:fix` — проверка/автофикс SCSS
- `docker compose down` — остановить окружение (данные БД сохраняются в volume `db_data`)
- `docker compose down -v` — остановить и удалить volumes (полный сброс)
