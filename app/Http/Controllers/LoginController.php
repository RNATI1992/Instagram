<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function conectarse(){
        return view('auth.login');
    }

    public function pag_inicio_usuario(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credenciales = request()->only('email', 'password');

        if(Auth::attempt($credenciales)){
            request()->session()->regenerate();
            return redirect()->to('/publicaciones');

        }

        return redirect()->to('/login');
    }
}
