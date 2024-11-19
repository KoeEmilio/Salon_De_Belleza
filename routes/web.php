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



use App\Http\Controllers\FavoritosController;

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

// Rutas de perfil
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::middleware(['auth'])->group(function () {
    Route::get('/citas', [ClientePerfilController::class, 'citas'])->name('cliente.citas');
    Route::get('/perfil', [ClientePerfilController::class, 'DatosCliente'])->name('cliente.perfil');
});

Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/empleados', [DashboardController::class, 'empleados'])->name('empleados');
    Route::get('/servicios_admin', [DashboardController::class, 'servicios'])->name('servicios_admin');
    Route::get('/clientes_admin', [DashboardController::class, 'usuarios'])->name('clientes_admin');
    Route::get('/usuarios/{id}/edit', [DashboardController::class, 'FomrmEditarUsuario'])->name('usuarios.edit');
    Route::put('/usuarios/{id}', [DashboardController::class, 'Actualizardatos'])->name('update.user');
    Route::put('/user/{id}/toggle-status', [DashboardController::class, 'toggleStatus'])->name('toggle.status');
});

Route::middleware(['auth', 'role:recepcionista'])->group(function () {
    Route::get('/inicio_recepcionista', [RecepcionistaController::class, 'index'])->name('recepcionista.inicio');
});
Route::post('/register-person', [UserController::class, 'registerPerson'])->name('register.person');
Route::get('/welcome', [InicioController::class, 'index'])->name('welcome');
Route::get('/servicio', [ServicioHomeController::class, 'index'])->name('servicio');
Route::get('/galeria', [GaleriaController::class, 'index'])->name('galeria');
Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');
Route::get('/paso1', function () { return view('cita1');});
Route::get('/paso2', function () { return view('cita2');});
Route::get('/servicios', [ServicioController::class, 'index'])->name('servicios.index');
Route::get('/agregado', [FavoritosController::class, 'index'])->name('agregado');
Route::get('/servicios/agregados', [ServicioController::class, 'agregados'])->name('servicios.agregados');
Route::get('/carga', function () { return view('carga');})->name('carga');
Route::view('/paso1', 'cita1')->name('paso1');

Route::post('/guardar-fecha', [AppointmentController::class, 'guardarFecha'])->name('guardar.fecha');
Route::post('/appointments/guardar', [AppointmentController::class, 'guardarFecha'])->name('appointments.guardar');
Route::post('/guardar-fecha-hora', [AppointmentController::class, 'guardarFechaHora'])->name('guardar.fecha.hora');
Route::post('/guardar-fecha-hora', [AppoinmentController::class, 'store']);
Route::post('/ruta/guardar-fecha-hora', [AppointmentController::class, 'store']);

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

    Route::prefix('citas')->group(function () {
        Route::get('{id}/servicios', [ServicioController::class, 'index'])->name('recepcionista.citas.servicios');
    });

    Route::prefix('servicios')->group(function () {
        Route::get('/servicios/{appointmentId}', [ServicioController::class, 'index'])->name('ver_servicios');
        Route::get('servicios/create/{appointmentId}', [ServicioController::class, 'create'])->name('servicios.create');
        Route::post('servicios/store/{appointmentId}', [ServicioController::class, 'store'])->name('servicios.store');
        Route::get('{id}/edit/{appointmentId}', [ServicioController::class, 'edit'])->name('servicios.edit');
        Route::put('{id}/{appointmentId}', [ServicioController::class, 'update'])->name('servicios.update');
        Route::delete('{id}', [ServicioController::class, 'destroy'])->name('servicios.destroy');
    });

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
    Route::get('/clientes/{cliente}/historial-citas', [HistorialCitaClienteController::class, 'index'])->name('clientes.historial_citas');
});

// Incluir rutas de autenticación
require __DIR__.'/auth.php'; 
