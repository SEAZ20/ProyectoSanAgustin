<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class testigos extends Model
{
    public $table = "testigos";
    public $timestamps = false;
    protected $fillable = [
        'nombres_testigo', 'apellidos_testigo', 'novio_o_novia', 'novios_id'
    ];
    public function novios()
    {
        return $this->belongsTo('App\novios');
    }
}
