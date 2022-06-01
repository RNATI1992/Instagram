<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function vista(){
        return view('auth.perfil');
    }

    public function actualizar(Request $request){

        $request->validate([
            'new_name' => 'required',
            'new_surname' => 'required',
            'new_password' => '',
            'new_password_confirmation' => 'same:new_password'
        ]);

        $usuario = User::find(Auth::id());
        $usuario->name = $request->new_name;
        $usuario->surname = $request->new_surname;

        if($request->new_password != null){
            $usuario->password = Hash::make($request->new_password);
        }


        if($request->hasFile("foto_perfil")){
            $foto_perfil = $request->file("foto_perfil");
            $nombreImagen = Str::slug($request->nick).".".$foto_perfil->guessExtension();
            $ruta = public_path("img/perfil/");
            $foto_perfil->move($ruta, $nombreImagen);
            $usuario->foto_perfil = $nombreImagen;
        }

        $usuario->save();
        $request->session()->regenerate();

        return redirect()->route('publicaciones.index')->with('success', 'Los datos se han actualizado');

    }



}
