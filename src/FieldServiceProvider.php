<?php

namespace Aiman\ThaanaTinymceField;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class FieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->booted(function () {
            $this->routes();
        });

        $this->publishes([
            __DIR__ . '/../config/thaana-tinymce-field.php' => config_path('thaana-tinymce-field.php'),
        ]);

        Nova::serving(function (ServingNova $event) {
            Nova::script('dhivehi-tinymce', __DIR__.'/../dist/js/field.js');
            Nova::style('dhivehi-tinymce', __DIR__.'/../dist/css/field.css');
            Nova::script('thaana', __DIR__.'/../dist/jtk.js');
        });
    }

    /**
     * Register the tool's routes.
     *
     * @return void
     */
    protected function routes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Route::middleware(['nova'])
            ->prefix('nova-vendor/thaana-tinymce-field')
            ->group(__DIR__.'/../routes/api.php');
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        try {
            $this->mergeConfigFrom(__DIR__.'/../config/thaana-tinymce-field.php', 'thaana-tinymce-field');
        } catch (\Exception $exception){

        }
    }
}
