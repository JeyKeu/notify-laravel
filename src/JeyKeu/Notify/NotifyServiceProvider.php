<?php namespace JeyKeu\Notify;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class NotifyServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen('laravel.composing', function ( $event ) {
            dd($event);
        });
        $this->loadViewsFrom(__DIR__ . '/../../views', 'notify');

        $this->publishes([
            __DIR__ . '/../../views' => base_path('resources/views/vendor/notify')
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind('JeyKeu\Notify\Session\SessionInterface',
            'JeyKeu\Notify\Session\LaravelSession'
        );
        $this->app->bind('JeyKeu\Notify\Uri\UriInterface',
            'JeyKeu\Notify\Uri\LaravelUri'
        );

        $this->app->singleton('notify', function () {
            return $this->app->make('JeyKeu\Notify\NotifyClass');
        });

    }
}
