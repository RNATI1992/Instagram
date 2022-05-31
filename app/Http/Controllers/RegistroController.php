<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
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

        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->surname = $request->surname;
        $usuario->nick = $request->nick;
        $usuario->email = $request->email;
        $usuario->password = $request->password;

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
        return redirect()->to('/');
    }
}

