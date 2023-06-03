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

    <script src="{{ asset('js/ckeditor.js') }}"></script>
    <style>
         .corner-buttons {
        position: fixed;
        z-index: 9999;
        pointer-events: none; 
        }

        .corner-buttons button {
        width: 50px;
        height: 50px;
        border: 1;
        background-color: green;
        opacity: 0.2;
        pointer-events: auto; 
        cursor: pointer;
        transition: opacity 0.2s ease-out;
        }

        .corner-buttons button:hover {
            background-color: blue;
        opacity: 1;
        }
        .top-left{
            top: 0;
            left: 0;
            border-radius: 0   0 50px 0;
            position: fixed;
        }
        .top-right{
            top: 0;
            right: 0;
            border-radius: 0 0 0 50px ;
            position: fixed;
        }
        .bottom-left{
            bottom: 0;
            left: 0;
            border-radius: 0 50px 0 0;
            position: fixed;
        }
        .bottom-right{
            bottom: 0;
            right: 0;
            border-radius: 50px 0 0 0;
            position: fixed;
        }

        .a-right-t{

            top: 0;
            left: 0;   
             width: 50px;
            height: 25px;
        }
        .a-right-b{

    
            bottom: 0;
            left: 0;   
             width: 50px;
            height: 25px;
        }
        .a-left-r{
            top: 25px;
            right: 25px;
            width: 25px;
            height: 50px;
        }
        .a-left-l{
            top: 25px;
            left: 25px;
            width: 25px;
            height: 50px;
        }
        .a-left-b{
            bottom: 25px;
            right: 25px;
            width: 25px;
            height: 50px;
        }
        .a-left-br{
            
            bottom: 25px;
            left: 25px;
            width: 25px;
            height: 50px;
        }
        /* position absolute */
        .a-left-br, .a-left-b, .a-left-l, .a-left-r, .a-right-b, .a-right-t{
         position: absolute;
        }
        .row.position-fixed.top-0 {
        margin-top: 5rem;
        }

  #RPanel { 
    margin-top: 5rem;
    position: fixed;
    top: 0;
    right: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    z-index: 9999;
  }
  #Mblock {
  margin-top: 5em;
}



    </style>
</head>
<body>
    <div id="app">
        <div class="corner-buttons">
            <button class="top-left">
                <div class="a-left-r" onclick="hidePanel('LPanel')" >
                </div>
                <div class="a-right-t"   onclick="hidePanel('TPanel')">
                </div>
                
            </button>
            <button class="top-right">
            <div class="a-left-l"  onclick="hidePanel('RPanel')">
                </div>
                <div class="a-right-t"  onclick="hidePanel('TPanel')" >
                </div>
            </button>
            <button class="bottom-left">
            
                <div class="a-right-b"  onclick="hidePanel('BPanel')">
                </div>
            <div class="a-left-b" onclick="hidePanel('LPanel')">
                </div>    
            </button>
            <button class="bottom-right">
                
                <div class="a-right-b" onclick="hidePanel('BPanel')">
                </div>
            <div class="a-left-br"   onclick="hidePanel('RPanel')">
                </div>    
            </button>
        </div>
        <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="fixed-top bg-light d-flex justify-content-center align-items-center w-100" id="TPanel">
                <!-- Кнопки для верхней панели -->
                <x-icon.main :name="'lion'" :size="'3'" :color="'red'" />
                <x-icon.main :name="'cat'" :size="'3'" :color="'red'" />
                <x-icon.main :name="'plus'" :size="'3'" :color="'red'" />
            </div>


            <div class="col-12 d-flex flex-column align-items-center overflow-auto container" id="Mblock">
            <!-- Рабочая область с возможностью прокрутки -->
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                @yield('content')
            </div>
        

        </div>
        <div class="fixed-bottom bg-light d-flex justify-content-center align-items-center w-100"  id="BPanel">
            <!-- Кнопки для нижней панели -->
            <x-icon.main :name="'lion'" :size="'3'" :color="'red'" />
        <x-icon.main :name="'cat'" :size="'3'" :color="'red'" />
        <x-icon.main :name="'plus'" :size="'3'" :color="'red'" />
            </div>
        </div>
        <div class="row position-fixed top-0 w-100"  id="LPanel">
        <div class="col-1 bg-light d-flex flex-column align-items-left">
            <!-- Кнопки для левой панели -->левая <br> <br>
            <x-icon.main :name="'lion'" :size="'3'" :color="'red'" />
            <x-icon.main :name="'cat'" :size="'3'" :color="'red'" />
            <x-icon.main :name="'plus'" :size="'3'" :color="'red'" />
        </div>
        </div>

        <div id ="RPanel">

            <!-- Кнопки для правой панели --> право
            <x-icon.main :name="'lion'" :size="'3'" :color="'red'" />
            <x-icon.main :name="'cat'" :size="'3'" :color="'red'" />
            <x-icon.main :name="'plus'" :size="'3'" :color="'red'" />

        </div>


</div>

  


        
    
</body>
<script>

function hidePanel(id) {
  var navbar = document.getElementById(id);
  if (navbar.classList.contains("d-none")) {
    navbar.classList.remove("d-none");
  } else {
    navbar.classList.add("d-none");
  }
}

</script>

</html>
