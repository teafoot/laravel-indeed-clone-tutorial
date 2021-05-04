<?php

namespace App\Providers;

use View;
use App\Categoria;
use Illuminate\Support\ServiceProvider;

class CategoriasProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // pasar todas las categorias hacia todos los views (e.g. frontend) para mostrar en menu de navegacion
        View::composer('*', function($view) {
            $categorias = Categoria::all();
            $view->with('categorias', $categorias);
        });
    }
}
