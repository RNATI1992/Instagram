<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicaciones extends Model
{
    use HasFactory;

    protected $table = 'publicaciones';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'descripcion',
        'foto',
        'usu_id',
    ];
}
