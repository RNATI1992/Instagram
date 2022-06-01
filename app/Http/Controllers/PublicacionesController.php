<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicacionesController extends Controller
{
    
    public function conectarse(){
        //Nombre dle archivo blade
        return view('auth.publicaciones');
    }
}
