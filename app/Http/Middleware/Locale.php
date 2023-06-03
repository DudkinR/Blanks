<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $raw_locale = Session::get("locale", Config::get("app.locale")); # Если пользователь уже был на нашем сайте,
        # то в сессии будет значение выбранного им языка.
        if(session("locale")==null&&Auth::user()){
            $raw_locale = Session::get("locale", Auth::user()->lang);
        }
        if (in_array($raw_locale, Config::get("app.locale"))) {
            # Проверяем, что у пользователя в сессии установлен доступный язык  app.locales
            $locale = $raw_locale;

        } else {
            $locale = Config::get("app.locale");
        } # И присваиваем значение переменной $locale.
        App::setLocale($locale); # В ином случае присваиваем ей язык по умолчанию

        Session::put("locale", $locale); # Устанавливаем локаль приложения
        return $next($request); # И позволяем приложению работать дальше
    }
}
