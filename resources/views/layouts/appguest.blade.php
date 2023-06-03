<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/icofont.min.css') }}">
    <!-- Scripts -->
  
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
      <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/ckeditor.js') }}"></script>
    <style>
    body {
    background-image: url('{{ asset("img/5.jpg") }}');
    background-size: 100% auto;
    background-position: center center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    position: relative; /* добавляем позиционирование, чтобы иметь возможность добавить дочерний элемент поверх фонового изображения */
    }

    body::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(255, 255, 255, 0.8); /* устанавливаем чёрный цвет с 50% прозрачностью */
    z-index: -1; /* помещаем слой под фоновое изображение */
    }
    section {
      margin-bottom: 10px;
      opacity: 0.8;
    }
    .nav-item,.navbar-brand{
      background-color: rgba(0, 0, 0, 0.5);
      border-radius: 10px;
      margin-right: 20px;
      margin-bottom: 20px;
      padding: 10px;
    }
    .carousel-inner img {
	  width: 100%;
	  height: 100%;
	}
    </style>
</head>
<body>
          
    <header>
        <h1 class="color-">{{__("guest.Name_project")}}</h1>
        <nav class="navbar navbar-expand-lg navbar-transparent">
        <div class="container-fluid">
            <a class="navbar-brand" href="@guest {{route('home')}} @else {{route('homep')}} @endif" class="btn">
              <x-icon.main :name="'lion'" :size="'5'" :color="'yellow'" />{{__("Work")}}
            </a>
            
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
          
                <li class="nav-item">
                <a class="nav-link" href="{{route('guest.about')}}">
                <x-icon.main :name="'education'" :size="'5'" :color="'yellow'" />
                {{__("menu.about")}}
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{route('guest.contacts')}}">
                <x-icon.main :name="'ui-contact-list'" :size="'5'" :color="'yellow'" />
                {{__("menu.contacts")}}
                </a>
                </li>
                @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                        <x-icon.main :name="'login'" :size="'5'" :color="'yellow'" />
                        {{__("menu.login")}}
                        </a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                        <x-icon.main :name="'rocket-alt-2'" :size="'5'" :color="'yellow'" />
                         {{__("menu.register")}}
                        </a>
                    </li>
                @endif
                @else  
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('profile.index')}}">
                    <x-icon.main :name="'business-man-alt-1'" :size="'5'" :color="'yellow'" />
                     {{__("My profile")}}
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        <x-icon.main :name="'logout'" :size="'5'" :color="'yellow'" />
                        {{__("menu.loguot")}}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    </li>
                  
                @endif
            </ul>
            </div>
        </div>
        </nav>
    </header>
    <div id="app">
        <main class="py-4 container">
            @yield('content')
        </main>
    </div>
    <footer class="bg-dark text-light">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h5>{{__("About us")}}</h5>
        <p>
        {!!__("guest.footer.short")!!} 
        </p>
      </div>
      <div class="col-md-3">
        <h5>{{__("links")}}</h5>
        <ul class="list-unstyled">
          <li><a href="{{route('home')}}">{{__("menu.home")}}</a></li>
          <li><a href="{{route('guest.service')}}">{{__("menu.service")}}</a></li>
          <li><a href="{{route('guest.examples')}}">{{__("menu.examples")}}</a></li>
          <li><a href="{{route('guest.contacts')}}">{{__("menu.contacts")}}</a></li>
        </ul>
      </div>
      <div class="col-md-3">

      </div>
    </div>
  </div>
  <div class="bg-secondary py-2">
    <div class="container text-center">
      <p class="mb-0">&copy; 2023 My Company.{{__("footer.right")}}.</p>
    </div>
  </div>
</footer>
</body>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</html>
