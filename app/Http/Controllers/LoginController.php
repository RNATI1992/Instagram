<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\VarDumper\VarDumper;
use App\Models\User;

class LoginController extends Controller{
    public function conectarse(){
        return view('auth.login');
    }

    public function pag_inicio_usuario(Request $request){

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        // echo('hola');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('publicaciones.index')->with('success', 'Registro Confirmado. Porfavor haga el Login!');
        }
        return redirect()->route('publicaciones.index');
    }

} 
