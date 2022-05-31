<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', [LoginController::class, 'conectarse'])
    -> name('login.index');

Route::post('/login', [LoginController::class, 'pag_inicio_usuario'])
    -> name('login.pag_inicio_usuario');

Route::get('/registro', [RegistroController::class, 'registrarse'])
    -> name('registro.index');
<<<<<<< HEAD

Route::post('/registro', [RegistroController::class, 'pag_inicio_usuario'])
    -> name('register.pag_inicio_usuario');


// HOLA SOY UN CAMBIO

'hola que tal';
=======
>>>>>>> a95a5beaa01cbe167f4621738762c03297cac108
