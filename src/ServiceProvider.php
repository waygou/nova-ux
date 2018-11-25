<?php

namespace Waygou\NovaUx;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Nova::serving(function (ServingNova $event) {

            // Common Xheetah js libraries.
            Nova::script('nova-ux-affects', __DIR__.'/../dist/js/common/affects.js');

            // Field libraries.
            Nova::script('nova-ux-field-text', __DIR__.'/../dist/components/fields/text/js/bootvue.js');
            Nova::script('nova-ux-field-textarea', __DIR__.'/../dist/components/fields/textarea/js/bootvue.js');
            Nova::script('nova-ux-field-topic', __DIR__.'/../dist/components/fields/topic/js/bootvue.js');
            Nova::script('nova-ux-field-belongs-to', __DIR__.'/../dist/components/fields/belongs-to/js/bootvue.js');
            Nova::script('nova-ux-field-map', __DIR__.'/../dist/components/fields/map/js/bootvue.js');
            Nova::script('nova-ux-field-place', __DIR__.'/../dist/components/fields/place/js/bootvue.js');
            Nova::script('nova-ux-field-select', __DIR__.'/../dist/components/fields/select/js/bootvue.js');

            // Card libraries.
            Nova::script('nova-ux-card-resource-header', __DIR__.'/../dist/components/cards/resource-header/js/bootvue.js');
        });

        $this->routes();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function routes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Route::middleware(['nova'])
             ->namespace('Waygou\NovaUx\Http\Controllers')
             ->prefix('nova-vendor/waygou/nova-ux')
             ->group(__DIR__.'/../routes/api.php');
    }
}
