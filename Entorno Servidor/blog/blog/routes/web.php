<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// Ruta de la pagina de inicio
Route::get('/', function () {
    return view('inicio');
})->name('/');

// Ruta para los metodos requeridos de PostController
Route::resource('posts', PostController::class)->only(['index', 'show', 'create', 'edit']);