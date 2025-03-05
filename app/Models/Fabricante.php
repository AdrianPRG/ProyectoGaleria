<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fabricante extends Model
{
    protected $table = 'fabricantes';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'descripcion', 'imagen', 'activo'];

    public function pieza()
    {
        return $this->hasMany('App\Models\Pieza');
    }

    
}
