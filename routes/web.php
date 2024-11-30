<?php

use App\Http\Controllers\AgregarClienteRecepcionistaController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
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
use App\Http\Controllers\HorasController;


use App\Http\Controllers\FavoritosController;
use App\Http\Controllers\NominaController;
use App\Http\Controllers\NominasController;
use App\Http\Controllers\RecepcionistaServiciosController;
use App\Http\Controllers\TrabajosController;
use App\Http\Controllers\TurnosController;


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

Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

Route::get('reset-password/{token}', [UserController::class, 'resetPassword'])->name('password.reset');
Route::put('reset/password/{token}', [UserController::class, 'updatepassword'])->name('custom.password.update');

Route::get('/graficas',[ServicioController::class, 'serviciosmes'])->name('graficaMes');
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
    Route::get('/addservice', [ServiciosController::class, 'addservice'])->name('addservice');
    Route::post('/register-service', [ServiciosController::class, 'registerServiceAndType'])->name('register.service');
    Route::get('/graficas',[ServicioController::class, 'serviciosmes'])->name('graficaMes');

Route::get('nominas/{empleado_id}', [NominaController::class, 'index'])->name('nominas.index');
Route::get('nominas/create/{empleado_id}', [NominaController::class, 'create'])->name('nominas.create');
Route::post('nominas/{empleado_id}/store', [NominaController::class, 'store'])->name('nominas.store');
Route::get('/nominas/{empleado_id}/{nomina_id}', [NominaController::class, 'show'])->name('nominas.show');
Route::get('nominas/{empleado_id}/{nomina_id}/edit', [NominaController::class, 'edit'])->name('nominas.edit');
Route::put('nominas/{empleado_id}/{nomina_id}', [NominaController::class, 'update'])->name('nominas.update');
Route::delete('nominas/{nomina_id}', [NominaController::class, 'destroy'])->name('nominas.destroy');
Route::get('/nominas/export/{empleado_id}', [NominaController::class, 'export'])->name('nominas.export');



Route::get('/trabajos/{employee_id}', [TrabajosController::class, 'index'])
    ->name('trabajos.index');

    Route::get('/nominas', [NominaController::class, 'index'])->name('nominas');
    Route::get('/turnos', [EmpleadoAdminController::class, 'turnos'])->name('turnos');
    
    Route::delete('/servicios/{id}', [ServiciosController::class, 'delete'])->name('servicios.delete');



});

Route::middleware(['auth', 'role:recepcionista'])->group(function () {
    Route::get('/inicio_recepcionista', [RecepcionistaController::class, 'index'])->name('recepcionista.inicio');
});

Route::middleware(['auth', 'role:cliente'])->group(function () {
    Route::get('/carga', function () { return view('carga');})->name('carga');
    Route::view('/paso1', 'cita1')->name('paso1');
    Route::post('/guardar-cita', [AppointmentController::class, 'store'])->name('appointment.store');
    Route::post('/guardar-cita', [AppointmentController::class, 'store'])->name('guardar.cita');
    // web.php (Ruta)
    Route::post('/guardar-cita', [CitasController::class, 'guardarCita']);
    Route::post('/guardar-cita', [AppointmentController::class, 'guardarCita'])->name('guardarCita');
    Route::post('/guardar-cita', [AppointmentController::class, 'store']);
    
    
});
Route::post('/passwordmail', [UserController::class, 'passwordmail'])->name('passwordmail');
Route::post('/register-person', [UserController::class, 'registerPerson'])->name('register.person');
Route::get('/welcome', [InicioController::class, 'index'])->name('welcome');
Route::get('/servicio', [ServicioHomeController::class, 'index'])->name('servicio');
Route::get('/galeria', [GaleriaController::class, 'index'])->name('galeria');


Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');
Route::get('/paso1', function () { return view('cita1');});
Route::get('/paso2', function () { return view('cita2');});
Route::get('/paso3', function () { return view('cita3');});
Route::post('/appointments/store', [AppointmentController::class, 'store'])->name('appointments.store');



Route::get('/servicios', [ServicioController::class, 'index'])->name('servicios.index');
Route::get('/agregado', [FavoritosController::class, 'index'])->name('agregado');
Route::get('/servicios/agregados', [ServicioController::class, 'agregados'])->name('servicios.agregados');


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
    Route::get('/recepcionista/citas', [CitasRecepcionistaController::class, 'index'])->name('appointment.index');
Route::get('/recepcionista/citas/{id}/editar', [CitasRecepcionistaController::class, 'edit'])->name('appointment.edit');
Route::put('/recepcionista/citas/{id}', [CitasRecepcionistaController::class, 'update'])->name('appointment.update');
Route::get('appointments/create', [CitasRecepcionistaController::class, 'create'])->name('appointment.create');
Route::post('appointments', [CitasRecepcionistaController::class, 'store'])->name('appointment.store');


// servicios a citas
Route::get('recepcionista/appointment/{appointmentId}/services', [RecepcionistaServiciosController::class, 'index'])->name('service.index');
Route::get('recepcionista/appointment/{appointmentId}/services/create', [RecepcionistaServiciosController::class, 'create'])->name('service.create');
Route::post('recepcionista/appointment/{appointmentId}/services', [RecepcionistaServiciosController::class, 'store'])->name('service.store');
Route::get('recepcionista/service/{serviceDetailId}/edit', [RecepcionistaServiciosController::class, 'edit'])->name('service.edit');
Route::put('recepcionista/service/{serviceDetailId}', [RecepcionistaServiciosController::class, 'update'])->name('service.update');

Route::get('/', [ServiciosController::class, 'index'])->name('servicios_recepcionista');

    Route::prefix('citas')->group(function () {
        Route::get('{id}/servicios', [ServicioController::class, 'index'])->name('recepcionista.citas.servicios');
    }); 

    Route::prefix('servicios')->group(function () {
        

        // Rutas para los servicios asociados a una cita
        Route::prefix('servi')->group(function () {
// Mostrar servicios asociados a una cita
Route::get('/citas/{appointmentId}/servicios', [ServicioController::class, 'index'])->name('servi.index');

// Crear un servicio para una cita específica
Route::get('/citas/{appointmentId}/servicios/create', [ServicioController::class, 'create'])->name('servi.create');

// Guardar el servicio asociado a una cita
Route::post('/citas/{appointmentId}/servicios', [ServicioController::class, 'store'])->name('servi.store');

// Eliminar un servicio de una cita
Route::delete('/citas/{appointmentId}/servicios/{serviceId}', [ServicioController::class, 'destroy'])->name('servi.destroy');




        });
        
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




    Route::get('/clientes/{id}', [VerDetalleClienteController::class, 'show'])->name('clientes.show');
    Route::get('/clientes/{cliente}/historial-citas', [HistorialCitaClienteController::class, 'index'])->name('clientes.historial_citas');
});

// Incluir rutas de autenticación
require __DIR__.'/auth.php'; 


