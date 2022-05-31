<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicacionesController extends Controller
{
    public function pag_inicio_usuario(){
        $name = auth()->user()->name;
        return view('auth.publicaciones', ['name' => $name]);
    }
}
