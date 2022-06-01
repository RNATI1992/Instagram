<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Publicaciones;

class PublicacionesController extends Controller
{

    public function conectarse(){
        return view('auth.publicaciones');
    }

    public function pag_inicio_usuario(Request $request){

        $request->validate([
            'titulo' => 'required',
            'foto' => 'required',
            'descripcion' => 'required',
        ]);

        $publicacion = new Publicaciones([
            'titulo' => $request->nombre,
            'descripcion' => $request->descripcion,

        ]);

        if($request->hasFile("foto")){
            $foto = $request->file("foto");
            $nombreImagen = Str::slug($request->nick).".".$foto->guessExtension();
            $ruta = public_path("img/perfil/");
            $foto->move($ruta, $nombreImagen);
            $publicacion->foto = $nombreImagen;
        }
        

        $publicacion->save();
        return redirect()->route('publicaciones.index')->with('success', 'Publicación Confirmada!');

    }

}
