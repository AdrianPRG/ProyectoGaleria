<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    protected $table = 'galeria';
    protected $primaryKey = 'id';
    protected $fillable = ['id_usuario', 'id_puntuacion'];
    
    
}
