<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pieza extends Model
{
    protected $table = 'pieza';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'descripcion',
        'tipo',
        'imagen',
        'marca',
        'modelo',
        'puntuacion',
        'categoria_id',
        'fabricante_id'
    ];

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'pieza_id');
    }

    public function puntuacion()
    {
        return $this->hasMany(Puntuacion::class, 'pieza_id');
    }


    
}
