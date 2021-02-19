<?php

namespace galeriamedica\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use galeriamedica\Paciente;
use galeriamedica\Policies\PacientePolicy;
use galeriamedica\Album;
use galeriamedica\Policies\AlbumPolicy;
use galeriamedica\Archivo;
use galeriamedica\Policies\ArchivoPolicy;
use galeriamedica\User;
use galeriamedica\Policies\UserPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //'galeriamedica\Model' => 'galeriamedica\Policies\ModelPolicy',
        Paciente::class => PacientePolicy::class,
        Album::class => AlbumPolicy::class,
        Archivo::class => ArchivoPolicy::class,
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
