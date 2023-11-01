<?php

namespace App\Providers;

use App\Models\User;
use App\Repository\Admin\AdminImplement;
use App\Repository\Admin\AdminRepository;
use App\Repository\Login\LoginImplement;
use App\Repository\Login\LoginRepository;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Pagination\Paginator as PaginationPaginator;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(LoginRepository::class, LoginImplement::class);
        $this->app->bind(AdminRepository::class, AdminImplement::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        PaginationPaginator::useBootstrapFive();

        Gate::define('admin', function (User $user) {
            return $user->level === 'admin';
        });
    }
}
