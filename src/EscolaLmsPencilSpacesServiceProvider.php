<?php

namespace EscolaLms\PencilSpaces;

use EscolaLms\PencilSpaces\Providers\AuthServiceProvider;
use Illuminate\Support\ServiceProvider;

/**
 * SWAGGER_VERSION
 */
class EscolaLmsPencilSpacesServiceProvider extends ServiceProvider
{
    public const SERVICES = [];

    public const REPOSITORIES = [];

    public $singletons = self::SERVICES + self::REPOSITORIES;

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    public function register()
    {
        $this->app->register(AuthServiceProvider::class);
    }
}
