<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicacionesController extends Controller
{

    public function conectarse(){
        return view('auth.publicaciones');
    }
}
