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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
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
        Gate::define('access-frost-home', function ($user) {
        // 这里写入你的逻辑判断，比如：
        return $user->isAdmin(); // 用户角色为 admin 时允许访问
        });
    
    }
}
