<?php

namespace App\Providers;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Portal\AuthController;
use App\Http\Controllers\Portal\UserController;
use App\Repositories\Persistence\BlogRepository;
use App\Repositories\Persistence\UserRepository;
use Domain\Blog\Blog;
use Domain\User\User;
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

        $this->app->bind(UserController::class, function ($app) {
            return new UserController(new UserRepository(new User()));
        });

        $this->app->bind(AuthController::class, function ($app) {
            return new AuthController(new UserRepository(new User()));
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
