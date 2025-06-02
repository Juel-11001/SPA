<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

// Example: Import your model and policy


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // Add your model-policy mappings here
        'Illuminate\Notifications\DatabaseNotification'=>'App\Policies\NotificationPolicy'
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // You can define custom gates here
        // Gate::define('admin-only', fn ($user) => $user->is_admin);
    }
}
