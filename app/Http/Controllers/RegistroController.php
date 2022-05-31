<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegistroController extends Controller
{

    public function registrarse(){
        return view('auth.registro');
    }

    public function pag_inicio_usuario(Request $request){

        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'nick' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required'
        ]);


        $user = User::create(request(['name','surname','nick','email','password', '']));
        // auth()->instagram($user);

        return redirect()->to('/');
    }
}

