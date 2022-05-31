<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        return redirect()->to('/');
    }
}
