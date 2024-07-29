<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Admin\Property;
use App\Models\Contract;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('update-property', function (User $user, Property $property) {
            return $user->id === $property->user_id;
        });

        Gate::define('update-contract', function (User $user, Contract $contract) {
            return $user->id === $contract->user_id;
        });
    }
}
