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
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/ckeditor.js') }}"></script>
</head>
<body>
    <div id="app">
        <?php
        $leftM = [
            __("menu.home") => route("home"),
            __("menu.userdata") => [
                __("menu.profile") => route("profile.index"),
                //    __("menu.setting") => route("setting.index"),
            ],
            __("menu.lang") => [
                "en" => route("lang", ["locale" => "en"]),
                "uk" => route("lang", ["locale" => "uk"]),
                "ru" => route("lang", ["locale" => "ru"]),
            ],
            __("menu.action") => [
                __("menu.blanks") => route("blanks.index"),
                __("menu.category") => route("categories.index"),
                __("menu.problems") => route("problem.index"),
                __("menu.start") => route("start.index"),
                __("menu.item") => route("item.index"),
                //   __("menu.room") => route("room.index"),
                __("menu.position") => route("position.index"),
                __("menu.project") => route("project.index"),
            ],
            __("menu.design") => [
                __("menu.bootstrap") => route("bootstrap"),
                __("menu.test") => route("test"),
                __("menu.icons") => route("icons"),
                __("menu.ajax") => route("ajax"),
                __("menu.icons.show") => route("icons.show"),
                __("menu.cleancache1") => route("clear-cache"),
                __("menu.config") => route("clear-config"),
                __("menu.route") => route("clear-route"),
                __("menu.view") => route("clear-view"),
                __("menu.compiled") => route("clear-compiled"),
                __("menu.optimize") => route("clear-optimize"),
                __("menu.full") => route("clear-full"),
                __("menu.all") => route("clear-all"),
                "ses" => route("ses") . "?id=2",
            ],
            __("menu.roles") => [
                __("menu.rolesindex") => route("roles.index"),
                __("menu.rolescreate") => route("roles.create"),
                __("menu.userroles") => route("roles.users"),
            ],
        ];
        $menuadmin = [__("menu.design"), __("menu.roles")];
        $menuSuperuser = [__("menu.action")];
        $menuUser = [__("menu.userdata")];
        $menuCorporate = [];

        // form $items for navbar для ролей
        $items = [];
        if (Auth::user()) {
            foreach ($leftM as $key => $value) {
                $show = 0;
                if (in_array($key, $menuUser)) {
                    $items[$key] = $value;
                    $show = 1;
                } elseif (in_array($key, $menuCorporate)) {
                    $items[$key] = $value;
                    $show = 1;
                } elseif (in_array($key, $menuSuperuser)) {
                    $items[$key] = $value;
                    $show = 1;
                } elseif (in_array($key, $menuadmin)) {
                    $items[$key] = $value;
                    $show = 1;
                }
                if ($show == 1) {
                    if (is_array($value)) {
                        $items[$key] = [];
                        foreach ($value as $k => $v) {
                            if (in_array($k, $menuadmin)) {
                                $items[$key][$k] = $v;
                            } else {
                                $items[$key][$k] = $v;
                            }
                            $items[$key][$k] = $v;
                        }
                    }
                } else {
                    $items[$key] = $value;
                }
            }
        }
        ?>
        <x-navbar.main :title="'my site'" :leftM="$items"/>
        <hr> <hr>
        <main class="py-4">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</body>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</html>
