<?php

namespace DenizTezcan\LaravelPostcodeNLAPI;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class PostcodeNLAPIServiceProvider extends BaseServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/postcodenl.php' => config_path('postcodenl.php'),
        ]);
    }

    public function register()
    {
        $this->app->bind('postcodenl', function () {
            return new PostcodeNLAPI();
        });
    }

    public function provides()
    {
        return ['postcodenl'];
    }
}
