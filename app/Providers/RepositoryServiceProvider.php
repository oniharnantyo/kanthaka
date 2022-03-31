<?php

namespace App\Providers;

use App\Repositories\Persistence\BlogRepository;
use App\Repositories\Persistence\ModelHasRolesRepository;
use App\Repositories\Persistence\PermissionRepository;
use App\Repositories\Persistence\RoleHasPermissionRepository;
use App\Repositories\Persistence\RoleRepository;
use Domain\Blog\BlogRepositoryInterface;
use Domain\ModelHasRoles\ModelHasRolesRepositoryInterface;
use Domain\Role\PermissionRepositoryInterface;
use Domain\Role\RoleRepositoryInterface;
use Domain\RoleHasPermission\RoleHasPermissionRepositoryInterface;
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
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(BlogRepositoryInterface::class, BlogRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(PermissionRepositoryInterface::class, PermissionRepository::class);
        $this->app->bind(RoleHasPermissionRepositoryInterface::class, RoleHasPermissionRepository::class);
        $this->app->bind(ModelHasRolesRepositoryInterface::class, ModelHasRolesRepository::class);
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
