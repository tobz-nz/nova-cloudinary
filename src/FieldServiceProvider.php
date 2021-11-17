<?php

namespace Techful\CloudinaryField;

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
        $this->mergeConfigFrom(
            __DIR__ . '/../config/cloudinary-field.php',
            'cloudinary-field'
        );

        $this->publishes([
            __DIR__ . '/../config/cloudinary.php' => config_path('cloudinary-field.php'),
        ]);

        Nova::serving(function (ServingNova $event) {
            Nova::script('cloudinary-field', __DIR__ . '/../dist/js/field.js');
            Nova::style('cloudinary-field', __DIR__ . '/../dist/css/field.css');
        });
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
}
