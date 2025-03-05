<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Puntuacion extends Model
{
    protected $table = 'puntuacion';
    protected $primaryKey = 'id';
    protected $fillable = ['puntuacion', 'pieza_id', 'usuario_id'];
    
    public function galeria()
    {
        return $this->belongsTo('App\Models\Galeria', 'id_puntuacion');
    }
}
