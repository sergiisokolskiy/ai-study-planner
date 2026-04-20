<?php

namespace App\Providers;

use App\AI\Contracts\AiGatewayInterface;
use App\AI\Gateways\OpenRouterGateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AiGatewayInterface::class, OpenRouterGateway::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
