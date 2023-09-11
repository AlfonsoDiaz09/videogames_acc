<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendedorController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

#### RUTAS ADMIN ####

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin'); #Muestra todos los juegos en admin

Route::get('/nuevoJuego', function(){
    return view('admin_registra_juego');
}); #Muestra el formulario para registrar un juego
Route::resource('admin_juego', AdminController::class); #Crea un juego

Route::get('/editaJuego/{id}', [AdminController::class, 'show'], function(){
    return view('admin_edita_juego');
}); #Muestra los datos de un juego
Route::put('admin_juego/{id}', [AdminController::class, 'update']); #Actualiza un juego
Route::delete('admin_juego/{id}', [AdminController::class, 'destroy']); #Elimina un juego

#### RUTAS VENDEDOR ####

Route::get('/vendedor', [App\Http\Controllers\VendedorController::class, 'index'])->name('vendedor'); #Muestra todos los juegos en vendedor

Route::get('/nuevoJuegoV', function(){
    return view('vendedor_registra_juego');
}); #Muestra el formulario para registrar un juego
Route::resource('vendedor_juego', VendedorController::class); #Crea un juego

Route::get('/watchV{id}', [App\Http\Controllers\VendedorController::class, 'watchV'])->name('watchV');


#### RUTAS CLIENTE ####

Route::get('/cliente', [App\Http\Controllers\ClienteController::class, 'index'])->name('cliente'); #Muestra todos los juegos en cliente
Route::get('/terror', [App\Http\Controllers\ClienteController::class, 'terror'])->name('terror'); #Muestra todos los juegos de terror en cliente
Route::get('/accion', [App\Http\Controllers\ClienteController::class, 'accion'])->name('accion'); #Muestra todos los juegos de accion en cliente
Route::get('/aventura', [App\Http\Controllers\ClienteController::class, 'aventura'])->name('aventura'); #Muestra todos los juegos de aventura en cliente
Route::get('/puzzle', [App\Http\Controllers\ClienteController::class, 'puzzle'])->name('puzzle'); #Muestra todos los juegos de puzzle en cliente

Route::get('/biblioteca', [App\Http\Controllers\ClienteController::class, 'biblioteca'])->name('biblioteca'); #Muestra todos los juegos de puzzle en cliente
Route::get('/watch{id}', [App\Http\Controllers\ClienteController::class, 'watch'])->name('watch');
