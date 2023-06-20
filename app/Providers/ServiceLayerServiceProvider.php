<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ServiceLayerServiceProvider extends ServiceProvider {
    public function boot(){

    }

    public function register(){
        $this->app->bind('App\Services\DocumentServiceInterface', 'App\Services\DocumentService');
        $this->app->bind('App\Services\CategoryServiceInterface', 'App\Services\CategoryService');
    }
}
