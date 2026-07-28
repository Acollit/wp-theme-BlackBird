# ACF Pro

Положите сюда папку `advanced-custom-fields-pro` (нужна ваша лицензия ACF Pro).

## Вариант 1 — вручную

1. Скачайте zip на https://www.advancedcustomfields.com/my-account/
2. Распакуйте прямо в эту папку — должно получиться `plugins/advanced-custom-fields-pro/acf.php`
3. Активируйте: `docker compose exec wordpress wp plugin activate advanced-custom-fields-pro --allow-root`

## Вариант 2 — через Composer

1. Добавьте в `theme/composer.json` в секцию `repositories`:
   ```json
   {
     "type": "composer",
     "url": "https://connect.advancedcustomfields.com/v2/plugins/YOUR_ACF_PRO_KEY"
   }
   ```
2. `cd theme && composer require wpengine/advanced-custom-fields-pro`
3. Скопируйте `theme/vendor/wpengine/advanced-custom-fields-pro` в `plugins/advanced-custom-fields-pro`.

Без ACF Pro сайт продолжает работать: все обращения к `get_field()` в `inc/acf.php` защищены проверкой `function_exists()`.
