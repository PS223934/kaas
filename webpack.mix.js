mix.js('resources/js/app.js', 'public/js')  
    .postcss('resources/css/app.css', 'public/css/app.css', [
        require('tailwindcss'),
    ]);