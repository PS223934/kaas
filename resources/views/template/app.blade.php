<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>kaas</title> <!-- geloof het of niet -->
        <style>
            /* fonts */
            @font-face {
                font-family: 'Cheese1';
                src:url("{{asset('fonts/Cheese1.ttf.woff')}}") format("woff"),
                    url("{{asset('fonts/Cheese1.ttf.svg#Cheese1')}}") format('svg'),
                    url("{{asset('fonts/Cheese1.ttf.eot')}}"),
                    url("{{asset('fonts/Cheese1.ttf.eot?#iefix')}}") format('embedded-opentype'); 
                font-weight: normal;
                font-style: normal;
            }

            .cheese {
                font-family: 'Cheese1';
            }
        </style>
        @vite('resources/css/app.css')
        @vite('resources/css/main.css')
        <!-- vite doesn't work so here's a lazy fix -->
        <script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    </head>
    <body>
        @yield('content')
    </body>
</html>