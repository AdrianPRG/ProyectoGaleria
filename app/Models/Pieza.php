<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pieza extends Model
{

    use HasFactory;


    protected $table = 'pieza';
    protected $primaryKey = 'id';

    //Campos de la tabla
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

    //Accede a la tabla comentarios y saca los comentarios de la pieza
    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'pieza_id');
    }

    //Accede a la tabla puntuacion y saca las puntuaciones de la pieza
    public function puntuacion()
    {
        //Devolvemos las puntuaciones
        return $this->hasMany(Puntuacion::class, 'pieza_id');
    }


    
}
