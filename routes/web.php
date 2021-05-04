<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);

// Rutas protegidas
Route::group(['middleware' => ['auth', 'verified']], function() {
    // Rutas de vacantes
    Route::get('/vacantes', 'VacanteController@index')->name('vacantes.index');
    Route::get('/vacantes/create', 'VacanteController@create')->name('vacantes.create');
    Route::post('/vacantes', 'VacanteController@store')->name('vacantes.store');
    Route::get('/vacantes/{vacante}/edit', 'VacanteController@edit')->name('vacantes.edit');
    Route::put('/vacantes/{vacante}', 'VacanteController@update')->name('vacantes.update');
    Route::delete('/vacantes/{vacante}', 'VacanteController@destroy')->name('vacantes.destroy');

    // Subir Imagenes (con dropzone)
    Route::post('/vacantes/imagen', 'VacanteController@imagen')->name('vacantes.imagen');
    Route::post('/vacantes/borrarimagen', 'VacanteController@borrarimagen')->name('vacantes.borrar');

    // Cambiar estado de la vacante (Activo o inactivo)
    Route::post('/vacantes/{vacante}', 'VacanteController@estado')->name('vacantes.estado');

    // Notificaciones
    Route::get('/notificaciones', 'NotificacionesController')->name('notificaciones');
});

// Página de inicio
Route::get('/', 'InicioController')->name('inicio');

// Categorias (vacantes por categoria)
Route::get('/categorias/{categoria}', 'CategoriaController@show')->name('categorias.show');

Route::get('/candidatos/{id}', 'CandidatoController@index')->name('candidatos.index'); // mostrar los candidatos de la vacante especifica
Route::post('/candidatos/store', 'CandidatoController@store')->name('candidatos.store'); // formulario contacto (Enviar datos para una vacante)

// Muestra los trabajos en el front end sin autenticación
Route::get('/busqueda/buscar', 'VacanteController@resultados')->name('vacantes.resultados');
Route::post('/busqueda/buscar', 'VacanteController@buscar')->name('vacantes.buscar');
Route::get('/vacantes/{vacante}', 'VacanteController@show')->name('vacantes.show'); // comodin al final


