const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .js('resources/app/routes.js', 'public/app/js/routes.js')
    .js('resources/app/project.js', 'public/app/js/project.js')
    .postCss("resources/css/app.css", "public/app/css/app.css", [
        require("tailwindcss"),
     ])
    .vue()
