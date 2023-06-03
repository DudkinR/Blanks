<nav class="navbar navbar-expand-lg navbar-light bg-light  fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ url('/') }}">
                    {{ __("menu.site") }}
                </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        @foreach($leftM as $key=>$items)
            @if(gettype($items)=='array')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{$key}}
                    </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                @foreach($items as $k=>$item) 
                <li><a class="dropdown-item" href="{{$item}}">{{$k}}</a></li>
                @endforeach  
                </ul>
                </li>
            @else
            <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{$items}}">{{$key}}</a>
            </li>
            @endif
        @endforeach
        <!-- Authentication Links -->
        @guest
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @endif

            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
        @endguest
      </ul>
      <form  action="{{route('search')}}" method="post"  class="d-flex">
        @csrf
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="{{__('menu.Search')}}">
        <button class="btn btn-outline-success" type="submit">{{__("menu.Search")}}</button>
      </form>
    </div>
  </div>
</nav>