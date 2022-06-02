<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\LoginController;

use App\Http\Controllers\PublicacionesController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\ComentariosController;
use App\Http\Controllers\UserController;


Route::get('/login', [LoginController::class, 'conectarse'])
    -> name('login');

Route::post('/login', [LoginController::class, 'pag_inicio_usuario'])
    -> name('login.pag_inicio_usuario');

Route::get('/registro', [RegistroController::class, 'registrarse'])
    -> name('registro.index');

Route::post('/registro', [RegistroController::class, 'pag_inicio_usuario'])
    -> name('register.pag_inicio_usuario');

Route::get('/', [PublicacionesController::class, 'conectarse'])
    -> name('publicaciones.index')->middleware('auth');

Route::post('/', [PublicacionesController::class, 'create'])
    -> name('publicaciones.create')->middleware('auth');

Route::get('/logout', [LoginController::class, 'logout'])
    -> name('login.destroy')->middleware('auth');

Route::get('/perfil', [UserController::class, 'vista'])
    -> name('perfil')->middleware('auth');

Route::post('/perfil', [UserController::class, 'actualizar'])
    -> name('perfil.actualizar')->middleware('auth');

Route::post('/comentarios/{id}', [ComentariosController::class, 'create_coments'])
    -> name('comentarios.create')->middleware('auth');


Route::get('/likes/{id}', [LikesController::class, 'create'])
    -> name('likes.create')->middleware('auth');
