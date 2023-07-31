<?php

namespace EscolaLms\PencilSpaces;

use EscolaLms\PencilSpaces\Providers\AuthServiceProvider;
use EscolaLms\PencilSpaces\Providers\SettingsServiceProvider;
use Illuminate\Support\ServiceProvider;

/**
 * SWAGGER_VERSION
 */
class EscolaLmsPencilSpacesServiceProvider extends ServiceProvider
{
    public const CONFIG_KEY = 'pencil_spaces';

    public const SERVICES = [];

    public const REPOSITORIES = [];

    public $singletons = self::SERVICES + self::REPOSITORIES;

    public function register()
    {
        $this->app->register(AuthServiceProvider::class);
        $this->app->register(SettingsServiceProvider::class);
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', self::CONFIG_KEY);

        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    public function bootForConsole(): void
    {
        $this->publishes([
            __DIR__ . '/../config/config.php' => config_path(self::CONFIG_KEY . '.php'),
        ], self::CONFIG_KEY . '.config');
    }
}
