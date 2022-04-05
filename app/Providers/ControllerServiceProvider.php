<?php

namespace App\Providers;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Portal\AuthController;
use App\Http\Controllers\Portal\BlogController;
use App\Http\Controllers\Portal\DeleteImageController;
use App\Http\Controllers\Portal\DeleteImageControllerInterface;
use App\Http\Controllers\Portal\RoleController;
use App\Http\Controllers\Portal\UploadImageController;
use App\Http\Controllers\Portal\UploadImageControllerInterface;
use App\Http\Controllers\Portal\UserController;
use App\Repositories\Persistence\BlogRepository;
use App\Repositories\Persistence\ModelHasRolesRepository;
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
        $this->app->bind(UploadImageControllerInterface::class, UploadImageController::class);
        $this->app->bind(DeleteImageControllerInterface::class, DeleteImageController::class);

        $this->app->bind(AuthController::class, function ($app) {
            return new AuthController(new UserRepository(new User()));
        });

        $this->app->bind(UserController::class, function ($app) {
            return new UserController(
                new UserRepository(new User()),
                new RoleRepository(new Role()),
                new ModelHasRolesRepository(),
            );
        });

        $this->app->bind(RoleController::class, function ($app) {
            return new RoleController(
                new RoleRepository(new Role()),
                new PermissionRepository(new Permission()),
                new RoleHasPermissionRepository()
            );
        });

        $this->app->bind(BlogController::class, function ($app) {
            return new BlogController(
                new BlogRepository(new Blog()),
                new UploadImageController(),
                new DeleteImageController(),
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
