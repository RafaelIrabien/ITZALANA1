<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('titulo')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

    <link rel="stylesheet" href="css/all.min.css">
  <!-- Theme style -->
   
    <link rel="stylesheet" type="text/css" href="css/adminlte.min.css">
    <link rel="stylesheet" type="text/css" href="css/APPP.css">

    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
 
<body>

    <div id="app">
        <aside id="aside" class="main-sidebar sidebar-dark-warning elevation-4">
        <div id="fondo">
            <div class="container">
                
                <ul class="nav nav-treeview">
               <li id="inicio" class="nav-item"> 
                <a class="nav-link active"  style="color: black;background-color:#FFC000" href="{{ url('/') }}">
                    Inicio
                     <i class="fa fa-home"></i>
                </a>
                </li>    
              <!--  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button> -->

                
                    <!-- Left Side Of Navbar -->
                    

                    <!-- Right Side Of Navbar -->
                   
                        <!-- Authentication Links -->
                        @guest
                         
                            <li class="nav-item">
                                <a class="nav-link active" id="in" href="{{ route('login') }}">{{ __('Iniciar sesión') }} <i class="fa fa-user" aria-hidden="true"></i></a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link active"  id="re" href="{{ route('register') }}">{{ __('Registro') }} <i class="fa fa-user-plus"></i></a>
                                </li>

                            
                            @endif
                        @else
                            <li class="nav-item ">
                                <a >
                                    {{ Auth::user()->name }} 
                                </a>

                                <div >
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                             </ul>

                        @endguest

                           
                </div>
            </div>
        
</div>
 </div>

 </aside>

 <div class="content-wrapper">
        
    <div class="content">
      <div class="container-fluid">
        
            @yield('content')

        
      </div><!-- /.container-fluid -->
    </div>
</div>
   
</body>
</html>
