<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Support\Facades\Auth;
//use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        "App\Models\Model" => "App\Policies\ModelPolicy",
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */

    public function boot(GateContract $gate)
    {
        $this->registerPolicies();
        //    Passport::routes();
        //    Passport::tokensExpireIn(now()->addDays(15)); // срок жизни токенов - 15 дней
        //    Passport::refreshTokensExpireIn(now()->addDays(30)); // срок жизни refresh-токенов - 30 дней

        $gate->define("access-admin-routes", function ($user) {
            return $user->roles->contains("name", "admin");
        });

        // Debugging output
        /* $gate->before(function ($user, $ability) {
            var_dump($user->roles, $ability);
        }); */
    }
}
