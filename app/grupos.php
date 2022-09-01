<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class grupos extends Model
{
    public $table = 'grupos';
    public $timestamps = false;
    protected $fillable = ['nombre', 'descripcion'];
}
