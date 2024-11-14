<?php

use App\Http\Controllers\AgregarClienteRecepcionistaController;
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
use App\Http\Controllers\HistorialCitaClienteController;
use App\Http\Controllers\Recepcionista_Cliente_Controller;
use App\Http\Controllers\RecepcionistaController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServicioHomeController;
use App\Http\Controllers\VerDetalleClienteController;

// Ruta principal
Route::get('/', function () {
    return view('welcome');
});

// Rutas de perfil
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

// Rutas para admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Rutas para recepcionista
Route::middleware(['auth', 'role:recepcionista'])->group(function () {
    Route::get('/inicio_recepcionista', [RecepcionistaController::class, 'index'])->name('recepcionista.inicio');
});

// Rutas generales
Route::get('/welcome', [InicioController::class, 'index'])->name('welcome');
Route::get('/servicio', [ServicioHomeController::class, 'index'])->name('servicio');
Route::get('/galeria', [GaleriaController::class, 'index'])->name('galeria');
Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');
Route::get('/citas', [CitasController::class, 'index'])->name('citas');

// Rutas para usuarios
Route::post('/users/{id}/assign-role', [UserController::class, 'assignRole']);
Route::get('/users/{id}/roles', [UserController::class, 'getUserRoles']);

// Rutas con prefijo recepcionista
Route::prefix('recepcionista')->group(function () {
    Route::get('/dashboard', [RecepcionistaController::class, 'index'])->name('recepcionista.dashboard');
    Route::get('/citas', [RecepcionistaController::class, 'citas'])->name('recepcionista.citas');
    Route::get('/clientes', [RecepcionistaController::class, 'clientes'])->name('recepcionista.clientes');
    Route::get('/servicios', [RecepcionistaController::class, 'servicios'])->name('recepcionista.servicios');
    Route::get('/perfil', [RecepcionistaController::class, 'perfil'])->name('recepcionista.perfil');

    // Rutas para citas
    Route::get('/citas/agregar', [RecepcionistaController::class, 'create'])->name('recepcionista.citas.create');
    Route::post('/citas', [RecepcionistaController::class, 'store'])->name('recepcionista.citas.store');
    Route::get('/citas/{id}/editar', [RecepcionistaController::class, 'edit'])->name('recepcionista.citas.edit');
    Route::put('/citas/{id}', [RecepcionistaController::class, 'update'])->name('recepcionista.citas.update');
    Route::delete('/citas/{id}', [RecepcionistaController::class, 'destroy'])->name('recepcionista.citas.destroy');
    
    Route::prefix('clientes')->group(function () {
        Route::get('/', [Recepcionista_Cliente_Controller::class, 'index'])->name('clientes.index');
        Route::get('/clientes/registrar', [Recepcionista_Cliente_Controller::class, 'create'])->name('agregar_clienterecepcionista');
        Route::post('/', [Recepcionista_Cliente_Controller::class, 'store'])->name('clientes.store');
        Route::get('/{id}', [Recepcionista_Cliente_Controller::class, 'show'])->name('clientes.show');
        Route::get('/{id}/historial', [Recepcionista_Cliente_Controller::class, 'historial'])->name('clientes.historial');
        Route::put('/{id}', [Recepcionista_Cliente_Controller::class, 'update'])->name('clientes.update');
        Route::delete('/{id}', [Recepcionista_Cliente_Controller::class, 'destroy'])->name('clientes.destroy');
    });

    // Rutas para servicios
    Route::prefix('servicios')->group(function () {
        Route::get('/', [ServiciosController::class, 'index'])->name('servicios_recepcionista');
        Route::get('/servicios/{appointmentId}', [ServicioController::class, 'index'])->name('ver_servicios');
        Route::get('/servicios/create/{appointmentId}', [ServicioController::class, 'create'])->name('servicios.create');
        Route::post('/servicios/store/{appointmentId}', [ServicioController::class, 'store'])->name('servicios.store');
        Route::get('/{id}/edit/{appointmentId}', [ServicioController::class, 'edit'])->name('servicios.edit');
        Route::put('/{id}/{appointmentId}', [ServicioController::class, 'update'])->name('servicios.update');
        Route::delete('/{id}', [ServicioController::class, 'destroy'])->name('servicios.destroy');
    });
    Route::get('/clientes/{id}', [VerDetalleClienteController::class, 'show'])->name('clientes.show');
    Route::get('/clientes/{cliente}/historial-citas', [HistorialCitaClienteController::class, 'index'])->name('clientes.historial_citas');});

// Incluir rutas de autenticación
require __DIR__.'/auth.php';
