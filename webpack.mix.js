const mix = require('laravel-mix');

const ImageminPlugin = require('imagemin-webpack-plugin').default;
const imageminMozjpeg = require('imagemin-mozjpeg');

require('laravel-mix-polyfill');

mix
    // Обрабатываем JS
    .js(
        'resources/assets/js/main.js',
        'public/assets/js'
    ).vue()
    // Используем полифиллы
    .polyfill({
        enabled: true,
        useBuiltIns: "usage",
        targets: false, // Используем настройки browserslist из package.json
        debug: true,
        corejs: '3.8',
    })
    // Преобразовываем SASS в CSS
    .sass(
        'resources/assets/scss/main.scss', // Путь относительно каталога с webpack.mix.js
        'public/assets/css/' // Путь относительно каталога с webpack.mix.js
    )
    // Переопределяем параметры mix
    .options({
        processCssUrls: false, // Отключаем автоматическое обновление URL в CSS
        postCss: [
            // Добавляем вендорные префиксы в CSS
            require('autoprefixer')({
                cascade: false, // Отключаем выравнивание вендорных префиксов
            }),
            // Группируем стили по медиа-запросам
            require('postcss-sort-media-queries'),
        ],
    })
    // Настраиваем webpack для обработки изображений
    .version();