<?php

namespace App\Providers;

use Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-token', function ($user) {
            return $user->isAdmin() || $user->hasPermission('manage-token');
        });

        Gate::define('manage-user', function ($user) {
            return $user->isAdmin() || $user->hasPermission('manage-user');
        });

        Gate::define('manage-own-user', function ($authenticatedUser, $user) {
            return $authenticatedUser->isAdmin() || ($user->id !== $authenticatedUser->id);
        });      
    }
}
