<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {

        $this->registerPolicies();
        Passport::routes();
        Gate::define('isAdmin',function () {
            if (auth()->user()->isAdmin()) {
                return true;
            }
        });

        Gate::define('isModerator',function () {
            if (auth()->user()->isModerator()) {
                return true;
            }
        });

        Gate::define('isUser',function () {
            if (auth()->user()->isUser()) {
                return true;
            }
        });
        //
    }
}
