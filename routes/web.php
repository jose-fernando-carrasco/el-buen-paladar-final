<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;

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


/* Route::get('/', [MainController::class, 'login'])->name('main.login'); */
Route::get('/', [MainController::class, 'platillos'])->name('main.platillos');
Route::get('bebidas', [MainController::class, 'bebidas'])->name('main.bebidas');
Route::get('postres', [MainController::class, 'postres'])->name('main.postres');
Route::get('especiales', [MainController::class, 'especiales'])->name('main.especiales');
Route::get('reservas', [MainController::class, 'reservas'])->name('main.reservas');
Route::get('historial', [MainController::class, 'historial'])->name('main.historial');



/* Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard'); */

