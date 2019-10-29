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
    //to register a policy model and policy is needed
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        'App\Model\Section' => 'App\Policies\Section_policy',
        'App\Model\Comment' => 'App\Policies\Comment_policy',

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
