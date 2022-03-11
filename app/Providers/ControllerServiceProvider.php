<?php

namespace App\Providers;

use App\Http\Controllers\HomeController;
use App\Repositories\Persistence\BlogRepository;
use Domain\Blog\Blog;
use Illuminate\Support\ServiceProvider;

class ControllerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(HomeController::class, function ($app) {
            return new HomeController(new BlogRepository(new Blog()));
        });
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
