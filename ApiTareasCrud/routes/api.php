<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/tareas', function () {
    return "Aca estoy consultando mis tareas";
});

Route::get('/tarea/{id}', function () {
    return "Aca estoy preguntando mi tarea";
});

Route::post('/tarea', function () {
    return "Aca estoy guardando";
});

Route::put('/tarea/{id}', function () {
    return "Aca estoy actualizando";
});

Route::delete('/tarea/{id}', function () {
    return "Aca estoy borrando";
});

