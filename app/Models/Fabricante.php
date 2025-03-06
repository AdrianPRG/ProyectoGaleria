<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fabricante extends Model
{

    use HasFactory;


    protected $table = 'fabricante';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'descripcion', 'imagen', 'activo'];

    public function pieza()
    {
        return $this->hasMany('App\Models\Pieza');
    }

    
}
