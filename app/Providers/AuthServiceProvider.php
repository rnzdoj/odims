<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Role;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Budget' => 'App\Policies\BudgetPolicy',
        'App\Models\Dratshang' => 'App\Policies\DratshangPolicy',
        'App\Models\Education' => 'App\Policies\EducationPolicy',
        'App\Models\Monk' => 'App\Policies\MonkPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function(){
            return auth()->user()->role_id == Role::ADMIN;
        });
        Gate::define('manager', function(){
            return auth()->user()->role_id == Role::MANAGER;
        });
        Gate::define('user', function(){
            return auth()->user()->role_id == Role::USER;
        });
    }
}
