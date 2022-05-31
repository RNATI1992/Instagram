<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PublicacionesController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\ComentariosController;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', [LoginController::class, 'conectarse'])
    -> name('login.index');

Route::post('/login', [LoginController::class, 'pag_inicio_usuario'])
    -> name('login.pag_inicio_usuario');

Route::get('/registro', [RegistroController::class, 'registrarse'])
    -> name('registro.index');

Route::post('/registro', [RegistroController::class, 'pag_inicio_usuario'])
    -> name('register.pag_inicio_usuario');

Route::get('/publicaciones', [PublicacionesController::class, 'pag_inicio_usuario'])
    -> name('publicaciones.index');
