<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puntuacion extends Model
{
    use HasFactory;
    protected $table = 'puntuacion';
    protected $primaryKey = 'id';
    protected $fillable = ['puntuacion', 'pieza_id', 'user_id'];
    
    public function galeria()
    {
        return $this->belongsTo('App\Models\Galeria', 'id_puntuacion');
    }
}
