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
        //User Access
        Gate::define('user-access', function($user){
            return $user->userStatus($user);
        });

        //Admin Access

        Gate::define('admin-access', function($user){
            return $user->hasAdminHaveRoles(['superadmin','admin','admin-editor']);
        });
        
    //Admin User Access to manage users

    Gate::define('admin-users', function($user){
        return $user->hasAdminHaveRoles(['superadmin','admin']);
    });

    }
}
