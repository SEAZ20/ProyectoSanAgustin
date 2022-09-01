<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informacion extends Model
{
    public $table = "informacion";
    public $timestamps = false;
    protected $fillable = ['direccion', 'horario', 'urlfacebook', 'urltwitter', 'urlinstagram', 'email'];
}
