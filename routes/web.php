<?php

use App\Http\Controllers\AgregarClienteRecepcionistaController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\CitasRecepcionistaController;
use App\Http\Controllers\ClientePerfilController;
use App\Http\Controllers\VerDetalleClienteController;

use App\Http\Controllers\ContactoController;
use App\Http\Controllers\GaleriaController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiciosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmpleadoAdminController;
use App\Http\Controllers\HistorialCitaClienteController;
use App\Http\Controllers\Recepcionista_Cliente_Controller;
use App\Http\Controllers\RecepcionistaController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServicioHomeController;



use App\Http\Controllers\FavoritosController;
use App\Http\Controllers\NominasController;
use App\Http\Controllers\RecepcionistaServiciosController;
use App\Http\Controllers\TrabajosController;
use App\Http\Controllers\TurnosController;
use App\Http\Controllers\VerDetalleClienteController;

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
    Route::get('/usuario/{id}/edit', [DashboardController::class, 'FomrmEditarUsuario'])->name('usuarios.edit');
    Route::put('/usuario/{id}', [DashboardController::class, 'ActualizarUsuario'])->name('usuarios.update');
    Route::put('/estado/{id}', [DashboardController::class, 'toggleStatus'])->name('toggle.status');
    Route::put('/update-user', [UserController::class, 'update'])->name('update.user');



    Route::get('/nominas', [EmpleadoAdminController::class, 'nominas'])->name('nominas');
Route::get('/turnos', [EmpleadoAdminController::class, 'turnos'])->name('turnos');
Route::get('/trabajos', [EmpleadoAdminController::class, 'trabajos'])->name('trabajos');


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

Route::post('/appointments/store', [AppointmentController::class, 'store'])->name('appointments.store');



Route::get('/servicios', [ServicioController::class, 'index'])->name('servicios.index');
Route::get('/agregado', [FavoritosController::class, 'index'])->name('agregado');
Route::get('/servicios/agregados', [ServicioController::class, 'agregados'])->name('servicios.agregados');
Route::get('/carga', function () { return view('carga');})->name('carga');
Route::view('/paso1', 'cita1')->name('paso1');

Route::post('/guardar-fecha-hora', [AppointmentController::class, 'store'])->name('appointment.store');
Route::post('/guardar-fecha-hora', [AppointmentController::class, 'store']);


// Rutas para usuarios
Route::post('/users/{id}/assign-role', [UserController::class, 'assignRole']);
Route::get('/users/{id}/roles', [UserController::class, 'getUserRoles']);

// Rutas con prefijo recepcionista
Route::prefix('recepcionista')->group(function () {
    Route::get('/dashboard', [RecepcionistaController::class, 'index'])->name('recepcionista.dashboard');
    Route::get('/citas', [RecepcionistaController::class, 'citas'])->name('recepcionista.citas');
    Route::get('/clientes', [RecepcionistaController::class, 'clientes'])->name('recepcionista.clientes');
    Route::get('/servicios', [RecepcionistaController::class, 'servicios'])->name('recepcionista.servicios');

    // Rutas para citas
    Route::get('/', [CitasRecepcionistaController::class, 'index'])->name('citas.index');
    Route::post('/', [CitasRecepcionistaController::class, 'store'])->name('citas.store');
    Route::delete('{id}', [CitasRecepcionistaController::class, 'destroy'])->name('citas.destroy');
    Route::get('citas/{id}/edit', [CitasRecepcionistaController::class, 'edit'])->name('citas.edit');
    Route::put('citas/{id}', [CitasRecepcionistaController::class, 'update'])->name('citas.update');
    Route::get('citas/create', [CitasRecepcionistaController::class, 'create'])->name('citas.create');

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
    Route::get('services', [RecepcionistaServiciosController::class, 'index'])->name('services.index');
    Route::get('services/create', [RecepcionistaServiciosController::class, 'create'])->name('services.create');
    Route::post('services', [RecepcionistaServiciosController::class, 'store'])->name('services.store');
        Route::get('/services/data/{id}', [RecepcionistaServiciosController::class, 'getServiceData'])->name('services.data');
        Route::get('/servicios/{service}/editar', [RecepcionistaServiciosController::class, 'edit'])->name('services.edit');
        Route::put('/servicios/{service}', [RecepcionistaServiciosController::class, 'update'])->name('services.update');
        Route::delete('/recepcionista/servicios/{index}', [RecepcionistaServiciosController::class, 'destroy'])->name('services.destroy');
        Route::get('/citas/{appointmentId}/servicios', [RecepcionistaServiciosController::class, 'showServices'])->name('servicios.show');


    });

    Route::get('/clientes/{id}', [VerDetalleClienteController::class, 'show'])->name('clientes.show');
    Route::get('/clientes/{cliente}/historial-citas', [HistorialCitaClienteController::class, 'index'])->name('clientes.historial_citas');
});

// Incluir rutas de autenticación
require __DIR__.'/auth.php'; 


