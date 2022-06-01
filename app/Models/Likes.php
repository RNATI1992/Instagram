<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    use HasFactory;

    protected $table = 'likes';
    protected $primaryKey = 'id';

    protected $fillable = [
        'usu_id',
        'publi_id',
    ];


    // Relación uno a muchos (inversa)
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function publicacion(){
        return $this->belongsTo('App\Models\Publicaciones');
    }


}
