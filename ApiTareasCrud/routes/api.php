<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\tareaController;

Route::get('/tareas', [tareaController::class, 'consultarTareas']);

Route::get('/tarea/{id}', [tareaController::class, 'consultarTarea']);

Route::post('/tarea', [tareaController::class, 'crearTarea']);

Route::put('/tarea/{id}', [tareaController::class, 'actualizarTarea']);

Route::delete('/tarea/{id}', [tareaController::class, 'eliminarTarea']);

