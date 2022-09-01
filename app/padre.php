<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class padre extends Model
{
    public $table = "padres";
    public $timestamps = false;
    protected $fillable = ['nombres_p', 'apellidos_p', 'nombres_m', 'apellidos_m'];
    public function persona()
    {
        return $this->hasMany('App\persona');
    }
}
