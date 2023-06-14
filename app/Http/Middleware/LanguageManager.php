<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Auth;
class LanguageManager
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
        if (session()->has("locale")) {
            app()->setLocale(session()->get("locale"));
        } else {
         if (Auth::check()) {
            app()->setLocale(Auth::user()->profile()->first()->lang);
               session()->put("locale", Auth::user()->profile()->first()->lang);
            } else {
              app()->setLocale(config("app.locale"));
             //  session()->put("locale", config("app.locale"));
            }
        }
        return $next($request);
    }
}
