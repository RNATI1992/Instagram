<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegistroController extends Controller
{

    public function registrarse(){
        return view('auth.registro');
    }

    public function pag_inicio_usuario(){
        $user = User::create(request(['name','surname','nick','email','password', '']));

        // auth()->instagram($user);
        return redirect()->to('/');
    }
}

