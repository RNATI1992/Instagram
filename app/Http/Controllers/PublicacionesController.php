<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PublicacionesController extends Controller
{

    public function conectarse(){
        return view('auth.publicaciones');
    }

    public function pag_inicio_usuario(){
        
    }

}
