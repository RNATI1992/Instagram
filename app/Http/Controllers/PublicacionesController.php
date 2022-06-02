<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Publicaciones;
use App\Models\Likes;
use Illuminate\Support\Facades\DB;

class PublicacionesController extends Controller
{

    public function conectarse(){

        $publicaciones = DB::table('publicaciones')
                ->orderBy('created_at', 'desc')
                ->get();

        return view('auth.publicaciones', compact('publicaciones'));
    }

    public function create(Request $request){

        $request->validate([
            'titulo' => 'required',
            'foto' => 'required',
            'descripcion' => 'required',
        ]);

        $publicacion = new Publicaciones;
                                //request mas nombre del formulario
        $publicacion->nombre = $request->titulo;
        $publicacion->descripcion = $request->descripcion;


        if($request->hasFile("foto")){
            $foto = $request->file("foto");
            $nombreImagen = Str::slug($request->titulo).".".$foto->guessExtension();
            $ruta = public_path("img/publicacion/");
            $foto->move($ruta, $nombreImagen);
            $publicacion->foto = $nombreImagen;
        }


        $publicacion->usu_id = Auth::id();
        $publicacion->save();

        return redirect()->route('publicaciones.index')->with('success', 'Publicación Confirmada!');

    }

    

}
