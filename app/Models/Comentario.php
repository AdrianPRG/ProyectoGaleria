<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;
    protected $table = 'comentario';
    protected $primaryKey = 'id';
    protected $fillable = ['comentario', 'pieza_id', 'user_id'];

}
