<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ITZALANA</title>

        <!-- Fonts -->
     <!--   <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> -->

        <!-- Styles -->
        <style>
            html, body {
               
                background-image: url(dist/img/Fondo1.jpg);
                background-repeat: no-repeat;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                background: white;
                border:5px solid black;
                border-radius: 30px;
               
                right: 10px;
                top: 18px;
            }


            .content {
                background: lightyellow;
                text-align: center;
                border: 9px solid black;

                

            }

            .title {
                font-size: 120px;
                font-weight: bold;
                margin-left: 50px;
                margin-right: 50px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 17px;
                font-weight: 700;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;

            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
           
            @if (Route::has('login'))
                <div class="top-right links">
                     <br>
                    @auth
                        <a href="{{ url('/home') }}">Home</a> 

                    @else 

                        <a href="{{ route('login') }}">Iniciar sesión</a>


                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Registro</a>
                        @endif
                    @endauth
                    <br>
                    <br>
                </div>
            @endif

            <div class="content">
                <br>
                <div class="title m-b-md">
                    ITZALANA
                </div>
                
                <!--<div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div> -->
            </div>
        </div>
    </body>
</html>
