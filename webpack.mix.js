const mix = require('laravel-mix');

mix.postCss('resources/css/app.css', 'public/css', [
    require('tailwindcss')
])

mix.js('resources/js/app.js', 'public/js')

mix.browserSync({
    ui: false,
    injectChanges: true,
    notify: false,
    proxy: '127.0.0.1:8000',
  });
