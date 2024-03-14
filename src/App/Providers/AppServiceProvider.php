<?php

namespace MicroService\App\Providers;

use Illuminate\Support\ServiceProvider;
use MicroService\App\Services\ItemService;
use MicroService\App\Contracts\ItemContract;
use Illuminate\Database\Eloquent\Factories\Factory;

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
