<?php

namespace MicroService\App\Providers;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Http\Redirector;
use MicroService\App\Contracts\ItemContract;
use MicroService\App\Services\ItemService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Factory::guessFactoryNamesUsing(function ($class) {
            return 'Database\\Factories\\' . class_basename($class) . 'Factory';
        });

        $this->app->bind(ItemContract::class, ItemService::class);
    }
}
