<?php

namespace App\Providers;

use App\Models\Disposisi;
use App\Models\User;
use App\Repository\Admin\AdminImplement;
use App\Repository\Admin\AdminRepository;
use App\Repository\Ajukan\PengajuanImplement;
use App\Repository\Ajukan\PengajuanRepository;
use App\Repository\Login\LoginImplement;
use App\Repository\Login\LoginRepository;
use App\Repository\Officer\OfficerRepository;
use App\Repository\Officer\OfficerImplement;
use App\Repository\Instansi\InstansiImplement;
use App\Repository\Instansi\InstansiRepository;
use App\Repository\Staff\StaffRepository;
use App\Repository\Staff\StaffImplement;
use App\Repository\Surat\SuratRepository;
use App\Repository\Surat\SuratImplement;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Contracts\Pagination\Paginator;
use App\Repository\Disposisi\DisposisiImplement;
use App\Repository\Disposisi\DisposisiRepository;
use App\Repository\Klasifikasi\KlasifikasiImplement;
use App\Repository\Klasifikasi\KlasifikasiRepository;
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
        $this->app->bind(OfficerRepository::class, OfficerImplement::class);
        $this->app->bind(StaffRepository::class, StaffImplement::class);
        $this->app->bind(SuratRepository::class, SuratImplement::class);
        $this->app->bind(InstansiRepository::class, InstansiImplement::class);
        $this->app->bind(DisposisiRepository::class, DisposisiImplement::class);
        $this->app->bind(KlasifikasiRepository::class, KlasifikasiImplement::class);
        $this->app->bind(PengajuanRepository::class, PengajuanImplement::class);
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
