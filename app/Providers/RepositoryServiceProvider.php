<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Http\Interfaces\MainAdminInterface',
            'App\Http\Repositories\MainAdminRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\UserInterface',
            'App\Http\Repositories\UserRepository',
        );

        $this->app->bind(
            'App\Http\Interfaces\CategoryInterface',
            'App\Http\Repositories\CategoryRepository',
        );

        $this->app->bind(
            'App\Http\Interfaces\BrandInterface',
            'App\Http\Repositories\BrandRepository',
        );

        $this->app->bind(
            'App\Http\Interfaces\SubCategoryInterface',
            'App\Http\Repositories\SubCategoryRepository',
        );

        $this->app->bind(
            'App\Http\Interfaces\ProductInterface',
            'App\Http\Repositories\ProductRepository',
        );

        $this->app->bind(
            'App\Http\Interfaces\CouponInterface',
            'App\Http\Repositories\CouponRepository',
        );

        $this->app->bind(
            'App\Http\Interfaces\NewsLaterInterface',
            'App\Http\Repositories\NewsLaterRepository',
        );

        $this->app->bind(
            'App\Http\Interfaces\Web\EndUserInterface',
            'App\Http\Repositories\Web\EndUserRepository',
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
