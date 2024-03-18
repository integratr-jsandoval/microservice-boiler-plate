<?php

namespace MicroService\App\Providers;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\ServiceProvider;
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
<<<<<<< HEAD
        
        //$this->app->bind(ItemContract::class, ItemService::class);


=======
        $this->app->bind(ItemContract::class, ItemService::class);
>>>>>>> 90174a0d37ce80d94d695288c09760ab47b61244
    }
}   
