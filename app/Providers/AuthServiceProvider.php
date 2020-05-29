<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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

        /*
         * this contain the same thing, but it is used on different things,
         * feel free to change that and add what you want
         */
        Gate::define('admin-access', function ($user) {
            return $user->hasRole('admin');
        });

        Gate::define('user-delete', function ($user) {
            return $user->hasRole('admin');
        });

        Gate::define('user-edit', function ($user) {
            return $user->hasRole('admin');
        });

        Gate::define('role-delete', function ($user) {
            return $user->hasRole('admin');
        });

        Gate::define('role-edit', function ($user) {
            return $user->hasRole('admin');
        });
    }
}
