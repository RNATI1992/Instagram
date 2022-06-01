<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Likes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    public function create($id){
        $likes = DB::table('likes')->where('usu_id', Auth::id());
        $likesCount = $likes->count();

        if($likesCount != 0){
            $likes->delete();

        }else{
            $like = new Likes;
            $like->usu_id = Auth::id();
            $like->publi_id = $id;

            $like->save();
        }



        return redirect()->route('publicaciones.index');
    }
}
