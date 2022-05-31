<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicacionesController extends Controller
{
    
    public function conectarse(){
        $user = Auth::user();
        print_r($user);

        return view('auth.publicaciones');
    }
}
