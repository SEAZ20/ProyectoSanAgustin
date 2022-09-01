<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class evento extends Model
{
    public $table = 'eventos';
    public $timestamps  = false;
    protected $fillable = ['nombre_e', 'fecha', 'descripcion_e'];
}
