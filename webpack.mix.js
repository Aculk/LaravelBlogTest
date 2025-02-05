const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .vue() // Поддержка Vue
    .postCss('resources/css/app.css', 'public/css', []); // Обработка CSS
