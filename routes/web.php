<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeniorController;
use App\Http\Controllers\RecordatoriosController;
use App\Http\Controllers\Notas_SaludController;
use App\Http\Controllers\CitaController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Mostrar listado de Adultos Mayores
Route::get('/seniors', [SeniorController::class, 'index'])->name('seniors.index');

// Mostrar formulario de creación
Route::get('/seniors/create', [SeniorController::class, 'create'])->name('seniors.create');

// Guardar nuevo adulto mayor
Route::post('/seniors', [SeniorController::class, 'store'])->name('seniors.store');

// Mostrar un adulto mayor específico
Route::get('/seniors/{senior}', [SeniorController::class, 'show'])->name('seniors.show');

// Mostrar formulario de edición
Route::get('/seniors/{senior}/edit', [SeniorController::class, 'edit'])->name('seniors.edit');

// Actualizar adulto mayor
Route::put('/seniors/{senior}', [SeniorController::class, 'update'])->name('seniors.update');

// Eliminar adulto mayor
Route::delete('/seniors/{senior}', [SeniorController::class, 'destroy'])->name('seniors.destroy');




// Rutas para Recordatorios

// Mostrar todos los recordatorios
Route::get('recordatorios', [RecordatoriosController::class, 'index'])->name('recordatorios.index');
// Mostrar formulario para crear un recordatorio
Route::get('recordatorios/create', [RecordatoriosController::class, 'create'])->name('recordatorios.create');
// Guardar un nuevo recordatorio
Route::post('recordatorios', [RecordatoriosController::class, 'store'])->name('recordatorios.store');
// Mostrar un recordatorio específico
Route::get('recordatorios/{id}', [RecordatoriosController::class, 'show'])->name('recordatorios.show');
// Mostrar formulario para editar un recordatorio
Route::get('recordatorios/{id}/edit', [RecordatoriosController::class, 'edit'])->name('recordatorios.edit');
// Actualizar un recordatorio
Route::put('recordatorios/{id}', [RecordatoriosController::class, 'update'])->name('recordatorios.update');
// Eliminar un recordatorio
Route::delete('recordatorios/{id}', [RecordatoriosController::class, 'destroy'])->name('recordatorios.destroy');



// Rutas para Notas de Salud

// Mostrar todas las notas de salud
Route::get('notas-salud', [Notas_SaludController::class, 'index'])->name('notas-salud.index');

// Mostrar formulario para crear una nota de salud
Route::get('notas-salud/create', [Notas_SaludController::class, 'create'])->name('notas-salud.create');

// Guardar una nueva nota de salud
Route::post('notas-salud', [Notas_SaludController::class, 'store'])->name('notas-salud.store');

// Mostrar una nota de salud específica
Route::get('notas-salud/{id}', [Notas_SaludController::class, 'show'])->name('notas-salud.show');

// Mostrar formulario para editar una nota de salud
Route::get('notas-salud/{id}/edit', [Notas_SaludController::class, 'edit'])->name('notas-salud.edit');

// Actualizar una nota de salud
Route::put('notas-salud/{id}', [Notas_SaludController::class, 'update'])->name('notas-salud.update');

// Eliminar una nota de salud
Route::delete('notas-salud/{id}', [Notas_SaludController::class, 'destroy'])->name('notas-salud.destroy');

// Rutas para Citas
Route::get('citas', [CitaController::class, 'index'])->name('citas.index');
Route::get('citas/create', [CitaController::class, 'create'])->name('citas.create');
Route::post('citas', [CitaController::class, 'store'])->name('citas.store');
Route::get('citas/{cita}', [CitaController::class, 'show'])->name('citas.show');
Route::get('citas/{cita}/edit', [CitaController::class, 'edit'])->name('citas.edit');
Route::put('citas/{cita}', [CitaController::class, 'update'])->name('citas.update');
Route::delete('citas/{cita}', [CitaController::class, 'destroy'])->name('citas.destroy');





require __DIR__.'/auth.php';
