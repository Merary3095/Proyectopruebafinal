<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Pregunta;
use App\Models\producto;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         //'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('cliente', function($user)
        {
            return $user->rol == "cliente";
        });
        Gate::define('supervisor', function($user)
        {
            return $user->rol == "supervisor";
        });
        Gate::define('encargado', function($user)
        {
            return $user->rol == "encargado";
        });
        Gate::define('contador', function($user)
        {
            return $user->rol == "contador";
        });
        Gate::define('preguntar', function($user)
        {
            return $user->rol == "cliente";
        });
        Gate::define('responder', function($user)
        {
            return $user->rol == "cliente";
        });
    }
}
