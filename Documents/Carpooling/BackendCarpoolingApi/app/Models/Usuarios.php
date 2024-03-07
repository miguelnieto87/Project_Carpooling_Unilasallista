<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Usuarios extends Model
{
    protected $table = 'usuarios';

    public $timestamps = false;
  
    protected $fillable = array('usuario','contrasena','nombres','apellidos','estamento','fecha_nacimiento');

    protected $hidden = [
        'contrasena',
    ];
}