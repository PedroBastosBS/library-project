<?php

namespace App\Providers;

use App\Core\Repositories\EmprestimoRepository;
use App\Core\Repositories\LivroRepository;
use App\Core\Repositories\UsuarioRepository;
use App\Core\Services\EmprestimoService;
use App\Core\Services\FuncionarioService;
use App\Domain\UseCases\EmprestimoUseCase;
use App\Domain\UseCases\FuncionarioUseCase;
use App\Infra\Repositories\EloquentEmprestimoRepository;
use App\Infra\Repositories\EloquentLivroRepository;
use App\Infra\Repositories\EloquentUsuarioRepository;
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
        //
        $this->app->singleton(EmprestimoUseCase::class, EmprestimoService::class);
        $this->app->singleton(EmprestimoRepository::class, EloquentEmprestimoRepository::class);
        $this->app->singleton(FuncionarioUseCase::class, FuncionarioService::class);
        $this->app->singleton(UsuarioRepository::class, EloquentUsuarioRepository::class);
        $this->app->singleton(LivroRepository::class, EloquentLivroRepository::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }

}
