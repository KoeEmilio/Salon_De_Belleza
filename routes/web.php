<?php

use App\Http\Controllers\CitasController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\GaleriaController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiciosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
  

});
Route::get('/welcome', [InicioController::class, 'index'])->name('welcome');
Route::get('/servicio', [ServiciosController::class, 'index'])->name('servicio');
    Route::get('/galeria', [GaleriaController::class, 'index'])->name('galeria');
    Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');
    Route::get('/citas', [CitasController::class, 'index'])->name('citas');
    Route::post('/users/{id}/assign-role', [UserController::class, 'assignRole']);
    Route::get('/users/{id}/roles', [UserController::class, 'getUserRoles']);

require __DIR__.'/auth.php';
