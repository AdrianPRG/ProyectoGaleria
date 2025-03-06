<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{

    use HasFactory;


    protected $table = 'categoria';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'descripcion'];
    

    public function pieza()
    {
        return $this->hasMany('App\Models\Pieza', 'id_categoria');
    }
}
