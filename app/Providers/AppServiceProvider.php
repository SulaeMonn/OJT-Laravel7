<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Dao Registration
        $this->app->bind('App\Contracts\Dao\TestDaoInterface', 'App\Dao\TestDao');
        // Business logic registration
        $this->app->bind('App\Contracts\Services\TestServiceInterface', 'App\Services\TestService');

        $this->app->bind('App\Contracts\Dao\Posts\PostDaoInterface', 'App\Dao\Posts\PostDao');
        $this->app->bind('App\Contracts\Services\Posts\PostServiceInterface', 'App\Services\Posts\PostService');

        $this->app->bind('App\Contracts\Dao\Users\UserDaoInterface', 'App\Dao\Users\UserDao');
        $this->app->bind('App\Contracts\Services\Users\UserServiceInterface', 'App\Services\Users\UserService');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
