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
      
    </style>
             @auth
            <?php
            $cruser = \App\Models\User::with("roles")
                ->with("profile")
                ->find(\Illuminate\Support\Facades\Auth::id());
            if (session("project") !== null) {
                $current_project = session("project");
            }
             if (session("blank") !== null) {
                $current_blank = session("blank");
            }
            
            ?>
            @endif 
    
</head>
<body class="@yield('type')">
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
            <div class="fixed-top d-flex justify-content-center align-items-center w-100
            @auth
            @if($cruser->profile->tpanel!==1) d-none @endif
            @endif 
             " id="TPanel" >
                <!-- Кнопки для верхней панели -->

                @auth
                    <div class="col-md-1">
                        <a href="{{route('homep')}}" class="btn" title="{{__('menu.home')}}">
                        <x-icon.main :name="'home'" :size="'2'" :color="'#626262'" /></a>
                    </div>
                <div class="col-md-1">
                    <a href="{{route('project.index')}}" class="btn" title="{{__('menu.project')}}">
                        <x-icon.main :name="'architecture-alt'" :size="'2'" :color="'#626262'" /></a>
              </div>
              @isset($current_project)
                <div class="col-md-1">
                     <a href="{{route('project.show',$current_project)}}" class="btn" title="{{__('mainf.startproject')}}">
                        <x-icon.main :name="'calendar'" :size="'2'" :color="'#626262'" /></a>
               </div>
              @endif
             @isset($current_blank)
                <div class="col-md-1">
                     <a href="{{route('blanks.show',$current_blank)}}" class="btn" title="{{__('Look current blank')}}">
                        <x-icon.main :name="'ebook'" :size="'2'" :color="'#626262'" /></a>
               </div> 
              @endif
                <div class="col-md-1">
                    <a href="{{route('categories.index')}}" class="btn" title="{{__('mainf.lookcategory')}}">
                        <x-icon.main :name="'chart-flow'" :size="'2'" :color="'#626262'" /></a>
              </div>
                <div class="col-md-1">
                    <a href="{{route('looks')}}" class="btn" title="{{__('mainf.look')}}">
                        <x-icon.main :name="'search-2'" :size="'2'" :color="'#626262'" /></a>
              </div>
              <div class="col-md-1">
                    <a href="{{route('langselect')}}" class="btn" title="{{__('Language')}}">
                        <x-icon.main :name="'pin'" :size="'2'" :color="'#626262'" /></a>
              </div>
                <div class="col-md-1">
                    {{Auth::user()->suns}}
                </div>
              @endif 
           
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
       <div class="space">

       </div>
        <div class="fixed-bottom   d-flex justify-content-center align-items-center w-100              @auth
            @if($cruser->profile->bpanel!==1) d-none @endif
            @endif "  id="BPanel">
           <div class="col-md-1">
                        <a href="{{route('home')}}" class="btn" title="{{__('menu.home')}}">
                        <x-icon.main :name="'ui-home'" :size="'2'" :color="'#626262'" /></a>
                    </div> 
          @auth   <!-- Кнопки для нижней панели -->
          
          <div class="col-md-1">
                    <a href="{{route('set.index')}}" class="btn" title="{{__('mainf.setting')}}">
                        <x-icon.main :name="'fix-tools'" :size="'2'" :color="'#626262'" /></a>
                </div>
                <div class="col-md-1">
                    <a href="{{route('profile.index')}}" class="btn" title="{{__('mainf.profile')}}">
                        <x-icon.main :name="'labour'" :size="'2'" :color="'#626262'" /></a>
                </div>
                <div class="col-md-1">
                    <a href="{{route('home')}}" class="btn" title="{{__('mainf.corporate')}}">
                        <x-icon.main :name="'workers-group'" :size="'2'" :color="'#626262'" /></a>
                </div>
                <div class="col-md-1">
                    <a href="{{route('home')}}" class="btn" title="{{__('mainf.lookproject')}}">
                        <x-icon.main :name="'search-document'" :size="'2'" :color="'#626262'" /></a>
              </div>
              <div class="col-md-1">
                    <a href="{{route('lang','en')}}" class="btn" title="{{__('mainf.lang')}}">
                        <x-icon.main :name="'abc'" :size="'2'" :color="'#626262'" /></a>
              </div>
              <!-- new ideas all -->
              <div class="col-md-1">
                    <a href="{{route('idea.index')}}" class="btn" title="{{__('mainf.ideas')}}">
                        <x-icon.main :name="'unique-idea'" :size="'2'" :color="'#626262'" /></a>
              </div>
                @endif 
                @guest
                @if (Route::has('login'))
                <div class="col-md-1">
                    <a href="{{route('login')}}" class="btn" title="{{__('login')}}">
                        <x-icon.main :name="'login'" :size="'2'" :color="'#626262'" /></a>
              </div>
                @endif
                @if (Route::has('register'))
                <div class="col-md-1">
                    <a href="{{route('register')}}" class="btn" title="{{__('register')}}">
                        <x-icon.main :name="'rocket-alt-2'" :size="'2'" :color="'#626262'" /></a>
                </div>
                @endif
                <div class="col-md-1">
                    <a href="{{route('help','about')}}" class="btn" title="{{__('Help me')}}" target="_blank">
                        <x-icon.main :name="'support-faq'" :size="'2'" :color="'#626262'" /></a>
                 </div>
            @else

                
                  <div class="col-md-1">
                    <a href="{{route('profile.index')}}" class="btn" title="{{__('Profile')}}">
                        <x-icon.main :name="'business'.Auth::user()->profile->sex" :size="'2'" :color="'#626262'" />
                    </a>
              </div>
              <div class="col-md-1">
                    <a href="{{route('help','about')}}" class="btn" title="{{__('Help me')}}" target="_blank">
                        <x-icon.main :name="'support-faq'" :size="'2'" :color="'#626262'" /></a>
              </div>

               <div class="col-md-1">
                    <a  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                     class="btn" title="{{__('Logout')}}">
                        <x-icon.main :name="'logout'" :size="'2'" :color="'#626262'" /></a>
                       <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                    
                </form> 
              </div>

            @endif
            </div>
        </div> 
         @auth
         <div   id="LPanel"     
      
            @if($cruser->profile->rpanel!==1) class="d-none" @endif
      
         >

         <!-- Кнопки для левой панели -->
            <?php 
                $icon_blank='{"text":"B","text_color":"#ffffff","bg_color":"#626262"}';
                $icon_item='{"text":"I","text_color":"#ffffff","bg_color":"#626262"}';
                $icon_cat='{"text":"C","text_color":"#ffffff","bg_color":"#626262"}';
                $icon_role='{"text":"R","text_color":"#ffffff","bg_color":"#626262"}';
                $icon_user='{"text":"U","text_color":"#ffffff","bg_color":"#626262"}';
            ?>

           <a href="{{route('blanks.index')}}" class="btn" title="{{__('menu.blanks')}}">
                <x-icon.myicon :data="$icon_blank" :size=3/> 
           </a>
            <a href="{{route('item.index')}}" class="btn" title="{{__('menu.itemindex')}}">
                <x-icon.myicon :data="$icon_item" :size=3/> 
            </a>
            @if($cruser->isAdmin())
            <a href="{{route('roles.index')}}" class="btn" title="{{__('menu.rolesindex')}}">
                <x-icon.myicon :data="$icon_role" :size=3/> 
            </a>
            <a href="{{route('roles.users')}}" class="btn" title="{{__('menu.userindex')}}">
                <x-icon.myicon :data="$icon_user" :size=3/> 
            </a>
            @endif 
                    
        @endif 

        </div>
   @auth
        <div id ="RPanel"   
      
            @if($cruser->profile->rpanel!==1) class="d-none" @endif
      
         >
         <?php
            $icon_problem='{"text":"P","text_color":"#ffffff","bg_color":"#626262"}';
            $icon_start='{"text":"S","text_color":"#ffffff","bg_color":"#626262"}';
            $icon_finish='{"text":"F","text_color":"#ffffff","bg_color":"#626262"}';
         ?>
           <!-- Кнопки для правой панели --> 
            <a href="{{route('problem.index')}}" class="btn" title="{{__('menu.problems')}}">
                <x-icon.myicon :data="$icon_problem" :size=3/> 
            </a>
            <a href="{{route('categories.index')}}" class="btn" title="{{__('menu.category')}}">
                <x-icon.myicon :data="$icon_cat" :size=3/>
            </a>   
            <a href="{{route('position.index')}}" class="btn" title="{{__('menu.positionindex')}}">
                <x-icon.main :name="'businessman'" :size="'1'" :color="'#626262'" /></a>
            <a href="{{route('start.index')}}" class="btn" title="{{__('menu.startindex')}}">
                <x-icon.myicon :data="$icon_start" :size=3/> 
            </a>
             <a href="{{route('finish.index')}}" class="btn" title="{{__('menu.finishindex')}}">
                <x-icon.myicon :data="$icon_finish" :size=3/> 
            </a>
         
            @if($cruser->isAdmin())
            <a href="{{route('adm')}}" class="btn"  target="_blank" title="{{__('menu.admin')}}">
                        <x-icon.main :name="'dog'" :size="'1'" :color="'#626262'" /></a> 

            @endif
      
          </div>
       @endif 

</div>

 
</body>
<script>

</script>

</html>
