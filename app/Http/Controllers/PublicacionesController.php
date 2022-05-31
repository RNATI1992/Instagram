<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicacionesController extends Controller
{
    public function pag_inicio_usuario(){
        return view('auth.publicaciones');
    }
}
