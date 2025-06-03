<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\JobListing;
use App\Policies\JobPolicy;
use App\Models\Employer;
use App\Policies\EmployerPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        JobListing::class => JobPolicy::class,
        Employer::class => EmployerPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        //
    }
}
