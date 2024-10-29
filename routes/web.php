<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\CitasRecepcionistaController;
use App\Http\Controllers\ClientePerfilController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\GaleriaController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiciosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Recepcionista_Cliente_Controller;
use App\Http\Controllers\RecepcionistaController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServicioHomeController;
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

Route::middleware(['auth','role:recepcionista'])->group(function () {
    Route::get('/inicio_recepcionista', [RecepcionistaController::class, 'index'])->name('recepcionista.inicio');

});
Route::get('/welcome', [InicioController::class, 'index'])->name('welcome');
Route::get('/servicio', [ServicioHomeController::class, 'index'])->name('servicio');
    Route::get('/galeria', [GaleriaController::class, 'index'])->name('galeria');
    Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');
    Route::get('/citas', [CitasController::class, 'index'])->name('citas');
    Route::post('/users/{id}/assign-role', [UserController::class, 'assignRole']);
    Route::get('/users/{id}/roles', [UserController::class, 'getUserRoles']);


    Route::prefix('recepcionista')->group(function () {
Route::get('/dashboard', [RecepcionistaController::class, 'index'])->name('recepcionista.dashboard');
Route::get('/citas', [RecepcionistaController::class, 'citas'])->name('recepcionista.citas');
Route::get('/clientes', [RecepcionistaController::class, 'clientes'])->name('recepcionista.clientes');
Route::get('/servicios', [RecepcionistaController::class, 'servicios'])->name('recepcionista.servicios');
Route::get('/perfil', [RecepcionistaController::class, 'perfil'])->name('recepcionista.perfil'); 


Route::get('/citas', [RecepcionistaController::class, 'citas'])->name('recepcionista.citas');
Route::get('/citas/agregar', [RecepcionistaController::class, 'create'])->name('recepcionista.citas.create');
Route::post('/citas', [RecepcionistaController::class, 'store'])->name('recepcionista.citas.store');
Route::get('/citas/{id}/editar', [RecepcionistaController::class, 'edit'])->name('recepcionista.citas.edit');
Route::put('/citas/{id}', [RecepcionistaController::class, 'update'])->name('recepcionista.citas.update'); // Cambié el nombre aquí
Route::delete('/citas/{id}', [RecepcionistaController::class, 'destroy'])->name('recepcionista.citas.destroy');

Route::prefix('citas')->group(function () {
    Route::get('{id}/servicios', [ServicioController::class, 'index'])->name('recepcionista.citas.servicios');
});

Route::prefix('servicios')->group(function () {

    Route::get('/servicios/{appointmentId}', [ServicioController::class, 'index'])->name('ver_servicios');
        Route::get('servicios/create/{appointmentId}', [ServicioController::class, 'create'])->name('servicios.create');
        Route::post('servicios/store/{appointmentId}', [ServicioController::class, 'store'])->name('servicios.store');
        Route::get('{id}/edit/{appointmentId}', [ServicioController::class, 'edit'])->name('servicios.edit'); // Añadido appointmentId
        Route::put('{id}/{appointmentId}', [ServicioController::class, 'update'])->name('servicios.update'); // Añadido appointmentId
        Route::delete('{id}', [ServicioController::class, 'destroy'])->name('servicios.destroy');
    });
    
    
    Route::prefix('clientes')->group(function () {
        Route::get('/clientes', [Recepcionista_Cliente_Controller::class, 'index'])->name('recepcionista.clientes2');
        Route::get('/clientes/registrar', [Recepcionista_Cliente_Controller::class, 'create'])->name('clientes.create');
        Route::post('/clientes', [Recepcionista_Cliente_Controller::class, 'store'])->name('clientes.store');
        Route::get('/clientes/{id}', [Recepcionista_Cliente_Controller::class, 'show'])->name('clientes.show');
        Route::get('/clientes/{id}/historial', [Recepcionista_Cliente_Controller::class, 'historial'])->name('clientes.historial');
        
    });
    Route::get('/servicios', [ServiciosController::class, 'index'])->name('servicios_recepcionista');

    Route::prefix('clientes')->group(function () {
        Route::get('/perfil', [ClientePerfilController::class, 'perfil'])->name('clientes.perfil');
        Route::get('/perfil/editar', [ClientePerfilController::class, 'editarPerfil'])->name('clientes.perfil.editar');
        Route::put('/perfil', [ClientePerfilController::class, 'actualizarPerfil'])->name('clientes.perfil.actualizar');
        Route::get('/perfil/historial', [ClientePerfilController::class, 'historialPerfil'])->name('clientes.perfil.historial');
    });

}); 

require __DIR__.'/auth.php'; 