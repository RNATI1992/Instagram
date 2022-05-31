<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', [LoginController::class, 'conectarse'])
    -> name('login.index');

Route::post('/registro', [RegistroController::class, 'pag_inicio_usuario'])
    -> name('register.pag_inicio_usuario');

Route::get('/registro', [RegistroController::class, 'registrarse'])
    -> name('registro.index');


<<<<<<< HEAD
=======

// HOLA SOY UN CAMBIO

'hola que tal';
>>>>>>> 3f83af5d139c3bda1e2caed864bff181012f2a50
