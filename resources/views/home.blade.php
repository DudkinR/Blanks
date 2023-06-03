<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/icofont.min.css') }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/ckeditor.js') }}"></script>
    <style>
    body {
    background-image: url('{{ asset('img/rezvani-Xn3D8DIzH7Q-unsplash.jpg') }}');
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
    background-color: rgba(0, 0, 0, 0.8); /* устанавливаем чёрный цвет с 50% прозрачностью */
    z-index: -1; /* помещаем слой под фоновое изображение */
    }
    section {
  margin-bottom: 10px;
  opacity: 0.8;
}
.nav-item,.navbar-brand{
  background-color: rgba(255, 255, 255, 0.5);
  border-radius: 10px;
  margin-right: 20px;
  margin-bottom: 20px;
  padding: 10px;
}
    </style>
</head>
<body>
<div class="container">


    </div>
</body>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</html>
