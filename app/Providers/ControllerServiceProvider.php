<?php

namespace App\Providers;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Portal\AuthController;
use App\Http\Controllers\Portal\RoleController;
use App\Http\Controllers\Portal\UserController;
use App\Repositories\Persistence\BlogRepository;
use App\Repositories\Persistence\PermissionRepository;
use App\Repositories\Persistence\RoleHasPermissionRepository;
use App\Repositories\Persistence\RoleRepository;
use App\Repositories\Persistence\UserRepository;
use Domain\Blog\Blog;
use Domain\User\User;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ControllerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Home
        $this->app->bind(HomeController::class, function ($app) {
            return new HomeController(new BlogRepository(new Blog()));
        });


        // Portal
        $this->app->bind(AuthController::class, function ($app) {
            return new AuthController(new UserRepository(new User()));
        });

        $this->app->bind(UserController::class, function ($app) {
            return new UserController(new UserRepository(new User()));
        });

        $this->app->bind(RoleController::class, function ($app) {
            return new RoleController(
                new RoleRepository(new Role()),
                new PermissionRepository(new Permission()),
                new RoleHasPermissionRepository()
            );
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
