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
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <style>
    
.sidebar {
  height: 100vh;
  overflow-y: scroll;
}

.navbar-nav {
  width: 100%;
}

.nav-link-scroll {
  padding: 8px 16px;
  font-size: 14px;
  color: #6c757d;
  display: block;
  margin: 0;
}

.nav-link-scroll:hover {
  background-color: #f1f1f1;
}

.navbar-nav > li:first-child {
  margin-top: 0;
}

    </style>
</head>
<body>
<div class="container-fluid p-0">
  <div class="row">
    <div class="col-md-2 bg-light sidebar">
      <!-- Боковое меню здесь -->
      <ul class="navbar-nav flex-column text-center">
      <li class="nav-item mt-2">
            <a class="nav-link nav-link-scroll" href="{{route('home')}}">{{__("Return")}}</a>
        </li>
        <li class="nav-item mt-2">
            <a class="nav-link nav-link-scroll" href="{{route('help.item','about')}}">{{__("About")}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-scroll" href="{{route('help.item','profile')}}">{{__("Profile")}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-scroll" href="{{route('help.item','setting')}}">{{__("Setting")}}</a>
        </li>
        <li class="nav-item mt-2">
            <a class="nav-link nav-link-scroll" href="{{route('help.item','categories')}}">{{__("Categories")}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-scroll" href="{{route('help.item','blank')}}">{{__("Blank")}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-scroll" href="{{route('help.item','start')}}">{{__("Start condition")}}</a>
        </li>
        <li class="nav-item mt-2">
            <a class="nav-link nav-link-scroll" href="{{route('help.item','position')}}">{{__("Position")}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-scroll" href="{{route('help.item','item')}}">{{__("Item")}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-scroll" href="{{route('help.item','project')}}">{{__("Project")}}</a>
        </li>
        <li class="nav-item mt-2">
            <a class="nav-link nav-link-scroll" href="{{route('help.item','work')}}">{{__("Work")}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-scroll" href="{{route('help.item','formblank')}}">{{__("Form blank")}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-scroll" href="{{route('help.item','formproject')}}">{{__("Form project")}}</a>
        </li>
        <li class="nav-item mt-2">
            <a class="nav-link nav-link-scroll" href="{{route('help.item','freeblank')}}">{{__("Free blank")}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-scroll" href="{{route('help.item','politics')}}">{{__("How politics system")}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-scroll" href="{{route('help.item','aims')}}">{{__("How aim")}}</a>
        </li>
        <li class="nav-item mt-2">
            <a class="nav-link nav-link-scroll" href="{{route('help.item','efecient')}}">{{__("Efecient")}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-scroll" href="{{route('help.item','recomends')}}">{{__("Recomends")}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-scroll" href="{{route('help.item','comands')}}">{{__("Form comands")}}</a>
        </li>
        <li class="nav-item mt-2">
            <a class="nav-link nav-link-scroll" href="{{route('help.item','groupwork')}}">{{__("Group work")}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-scroll" href="{{route('help.item','color')}}">{{__("Use Color")}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-scroll" href="{{route('help.item','stat')}}">{{__("Statistic")}}</a>
        </li>
        <li class="nav-item mt-2">
            <a class="nav-link nav-link-scroll" href="{{route('help.item','restAndWork')}}">{{__("Rest And Work")}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-scroll" href="{{route('help.item','stepbystep')}}">{{__("Step by step")}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-scroll" href="{{route('help.item','development')}}">{{__("Development")}}</a>
        </li>
        <li class="nav-item mt-2">
            <a class="nav-link nav-link-scroll" href="{{route('help.item','concept')}}">{{__("Concept")}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-scroll" href="{{route('help.item','h')}}">{{__("")}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-scroll" href="{{route('help.item','h')}}">{{__("")}}</a>
        </li>
        <li class="nav-item mt-2">
            <a class="nav-link nav-link-scroll" href="{{route('help.item','h')}}">{{__("")}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-scroll" href="{{route('help.item','h')}}">{{__("")}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-scroll" href="{{route('help.item','h')}}">{{__("")}}</a>
        </li>
        <li class="nav-item mt-2">
            <a class="nav-link nav-link-scroll" href="{{route('help.item','h')}}">{{__("")}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-scroll" href="{{route('help.item','h')}}">{{__("")}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-scroll" href="{{route('help.item','h')}}">{{__("")}}</a>
        </li>
        <!-- Добавьте дополнительные ссылки здесь -->
        </ul>

    </div>
    <div class="col-md-10">
      <!-- Содержимое страницы здесь -->
      @yield('content')   
    </div>
  </div>
</div>


</body>
</html>
