<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\VarDumper\VarDumper;

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

        VarDumper::dump($credenciales);

        if(Auth::attempt($credenciales)){
            request()->session()->regenerate();
            return redirect()->route('publicaciones.index');
        } else {
            print("me cago en todo");
        }

        //return redirect()->route('login');
    }
}
