<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'descripcion'];
    

    public function pieza()
    {
        return $this->hasMany('App\Models\Pieza', 'id_categoria');
    }
}
