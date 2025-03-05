<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'email', 'password', 'imagen'];
   

   

    public function comentario()
    {
        return $this->hasMany('App\Models\Comentario', 'usuario_id');
    }

    public function puntuacion()
    {
        return $this->hasMany('App\Models\Puntuacion', 'usuario_id');
    }

    public function galeria()
    {
        return $this->hasMany('App\Models\Galeria', 'usuario_id');
    }

    


}
