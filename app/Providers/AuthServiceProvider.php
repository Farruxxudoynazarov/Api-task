<?php

namespace App\Providers;

use App\Models\Company;
use App\Policies\CompanyPolicy;
use Illuminate\Support\Facades\Gate;
use App\Models\Employee;
use App\Policies\EmployeePolicy;


// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Employee::class => EmployeePolicy::class,
        Company::class => CompanyPolicy::class,


        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // $this->registerPolicies();

        Gate::define('view-companies', function ($user) {
            return $user->role === 'admin';
        });
    }
}
