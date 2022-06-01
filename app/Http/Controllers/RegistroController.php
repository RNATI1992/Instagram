<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{

    public function registrarse(){
        return view('auth.registro');
    }

    public function pag_inicio_usuario(Request $request){

        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'nick' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ]);

        $usuario = new User([
            'name' => $request->name,
            'surname' => $request->surname,
            'nick' => $request->nick,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);

        if($request->hasFile("foto_perfil")){
            $foto_perfil = $request->file("foto_perfil");
            $nombreImagen = Str::slug($request->nick).".".$foto_perfil->guessExtension();
            $ruta = public_path("img/perfil/");
            $foto_perfil->move($ruta, $nombreImagen);
            $usuario->foto_perfil = $nombreImagen;
        }
        $usuario->save();

        // User::create(request(['name','surname','nick','email','password','foto_perfil']));
        // auth()->instagram($user);

        // $usu = User::find(1);
        // <img src="/img/perfil/{{ $usu->foto_perfil }}" alt="">
        return redirect()->route('login')->with('success', 'Registro Confirmado. Porfavor haga el Login!');
    }
}

