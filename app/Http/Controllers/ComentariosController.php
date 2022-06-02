<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Comentarios;
use Illuminate\Support\Facades\DB;

class ComentariosController extends Controller
{
    public function create_coments(Request $request, $id){

        $request->validate([
            'comentario' => 'required',
        ]);

        $comentarios = new Comentarios;
        $comentarios->usu_id = Auth::id();
        $comentarios->publi_id = $id;
        $comentarios->contenido = $request->comentario;

        $comentarios->save();

        return redirect()->route('publicaciones.index');
    }
}
