<?php
namespace MyProjectVendor\PolymorphicImages;

use Illuminate\Support\ServiceProvider;

class ImageServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
    public function register()
    {
        //
    }
}
