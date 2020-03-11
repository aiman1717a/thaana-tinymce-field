<?php

namespace Aiman\DhivehiTinymce;

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
        $this->publishes([
            __DIR__ . '/../config/dhivehi-tinymce.php' => config_path('dhivehi-tinymce.php'),
        ]);

        Nova::serving(function (ServingNova $event) {
            Nova::script('dhivehi-tinymce', __DIR__.'/../dist/js/field.js');
            Nova::style('dhivehi-tinymce', __DIR__.'/../dist/css/field.css');
            Nova::script('thaana', __DIR__.'/../dist/jtk.js');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/dhivehi-tinymce.php', 'dhivehi-tinymce');
    }
}
