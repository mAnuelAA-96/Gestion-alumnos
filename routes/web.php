<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\NotasController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    //Route::get('/dashboard', function () {
    //    return view('dashboard');
    //})->name('dashboard');

    Route::get('/dashboard', [AlumnosController::class, 'index'])->name('dashboard');
    
    Route::get('/alumno', [AlumnosController::class, 'add'])->name('add');
    Route::post('/alumno', [AlumnosController::class, 'store'])->name('alumnos.store');

    Route::get('/alumno/{alumno}', [AlumnosController::class, 'edit'])->name('alumnos.edit');
    Route::post('/alumno/{alumno}', [AlumnosController::class, 'update'])->name('alumnos.update');

    //Vista de notas
    Route::get('/alumno/{alumno}/notas', [NotasController::class, 'index'])->name('alumno.notas');
    Route::get('/alumno/{alumno}/notas/add', [NotasController::class, 'add'])->name('notas.add');
    Route::post('/alumno/{alumno}/notas/store', [NotasController::class, 'store'])->name('notas.store');

    Route::get('/alumno/{alumno}/{nota}/edit', [NotasController::class, 'edit'])->name('notas.edit');
    Route::post('/alumno/{alumno}/{nota}/update', [NotasController::class, 'update'])->name('notas.update');


    //Route::get('/alumno', [AlumnosController::class, 'add']);
    //Route::post('/alumno', [AlumnosController::class, 'create']);
});
