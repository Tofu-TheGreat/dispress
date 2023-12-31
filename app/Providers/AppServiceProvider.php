<?php

namespace App\Providers;

use App\Models\Disposisi;
use App\Models\User;
use App\Repository\Admin\AdminImplement;
use App\Repository\Admin\AdminRepository;
use App\Repository\Ajukan\PengajuanImplement;
use App\Repository\Ajukan\PengajuanRepository;
use App\Repository\Dashboard\DashboardImplement;
use App\Repository\Dashboard\DashboardRepository;
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
use App\Repository\PosisiJabatan\PosisiJabatanImplements;
use App\Repository\PosisiJabatan\PosisiJabatanRepository;
use App\Repository\Profile\ProfileImplement;
use App\Repository\Profile\ProfileRepository;
use App\Repository\SuratKeluar\SuratKeluarImplement;
use App\Repository\SuratKeluar\SuratKeluarRepository;
use App\Repository\SuratTugas\SuratTugasImplement;
use App\Repository\SuratTugas\SuratTugasRepository;
use App\Repository\WebSetting\WebSettingImplement;
use App\Repository\WebSetting\WebSettingRepository;
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
        $this->app->bind(PosisiJabatanRepository::class, PosisiJabatanImplements::class);
        $this->app->bind(DashboardRepository::class, DashboardImplement::class);
        $this->app->bind(SuratKeluarRepository::class, SuratKeluarImplement::class);
        $this->app->bind(ProfileRepository::class, ProfileImplement::class);
        $this->app->bind(WebSettingRepository::class, WebSettingImplement::class);
        $this->app->bind(SuratTugasRepository::class, SuratTugasImplement::class);
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
        Gate::define('officer', function (User $user) {
            return $user->level === 'officer';
        });
        Gate::define('staff', function (User $user) {
            return $user->level === 'staff';
        });

        Gate::define('admin-officer', function (User $user) {
            return $user->level === 'admin' || $user->level === 'officer';
        });
    }
}
