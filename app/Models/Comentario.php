<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Comentario extends Model
{
    use HasFactory;
    protected $table = 'comentario';
    protected $primaryKey = 'id';
    protected $fillable = ['comentario', 'pieza_id', 'user_id'];

    //Se obtienen los comentarios de una pieza
    public function comentarios($pieza_id){
        return $this->belongsTo($pieza_id);
    }

    //Se obtiene el nombre del usuario segun el id del comentario
    public function getUserName($user_id){
        $user = User::find($user_id);
        return $user->name;
    }
    

}
