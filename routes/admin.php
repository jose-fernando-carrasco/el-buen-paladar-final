<?php

use App\Http\Controllers\Admin\BebidaController;
use App\Http\Controllers\Admin\EnsaladaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AlimentoController;
use App\Http\Controllers\Admin\CuentaController;
use App\Http\Controllers\Admin\EspecialController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\MesaController;
use App\Http\Controllers\Admin\PedidoController;
use App\Http\Controllers\Admin\PostreController;
use App\Http\Controllers\Admin\ReservaController;
use App\Http\Controllers\Admin\SopaController;
use App\Http\Controllers\Admin\UserController;

Route::get('', [HomeController::class, 'index'])->name('admin.home');

Route::resource('alimentos', AlimentoController::class)->except('show')->names('admin.alimentos');


Route::resource('usuarios', UserController::class)->only(['index', 'edit', 'update', 'destroy'])->names('admin.usuarios');

Route::resource('especiales', EspecialController::class)->except('show')->names('admin.especiales');

Route::resource('menus', MenuController::class)->except('show')->names('admin.menus');

Route::resource('pedidos', PedidoController::class)->only('index')->names('admin.pedidos');

Route::resource('cuentas', CuentaController::class)->only('index')->names('admin.cuentas');

Route::resource('mesas', MesaController::class)->except('show')->names('admin.mesas');

Route::resource('reservas', ReservaController::class)->names('admin.reservas');




