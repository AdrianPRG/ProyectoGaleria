<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = 'comentario';
    protected $primaryKey = 'id';
    protected $fillable = ['comentario', 'pieza_id', 'usuario_id'];

}
