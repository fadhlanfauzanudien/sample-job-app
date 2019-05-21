<?php

namespace App\Providers;

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

        Gate::define('view-admin-dashboard', function ($user) {
            return $user->email == 'admin@example.com';
        });

        Gate::define('apply', function (?\App\User $user) {
            if ($user === null) {
                return true;
            } elseif ($user->email === 'admin@example.com') {
                return true;
            } else {
                return $user->profile != null;
            }
        });
    }
}
