<?php

namespace MicroService\App\Providers;

use Illuminate\Contracts\Validation\ValidatesWhenResolved;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Http\Redirector;
use MicroService\App\Requests\BaseRequest;

class FormRequestServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->afterResolving(ValidatesWhenResolved::class, function ($resolved) {
            $resolved->validateResolved();
        });

        $this->app->resolving(BaseRequest::class, function ($request, $app) {
            $request = BaseRequest::createFrom($app['request'], $request);
            $request->setContainer($app)->setRedirector($app->make(Redirector::class));
        });
    }
}
