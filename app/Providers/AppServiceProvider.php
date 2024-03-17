<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Interfaces\PokemonServiceInterface;
use App\Services\PokemonService;
use App\Repositories\Interfaces\PokemonRepositoryInterface;
use App\Repositories\PokemonRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(PokemonServiceInterface::class, PokemonService::class);
        $this->app->bind(PokemonRepositoryInterface::class, PokemonRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
    }
}
