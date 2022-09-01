<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class novios extends Model
{
    public $table = "novios";
    public $timestamps = false;
    protected $fillable = [
        'nombres_novio', 'apellidos_novio', 'nombres_novia', 'apellidos_novia', 'slug', 'padres_novios_id'
    ];
    public function padres_novios()
    {
        return $this->belongsTo('App\padres_novios', 'padres_novios_id');
    }
    public function testigos()
    {
        return $this->hasMany('App\testigos');
    }
    public function novios_sacramento()
    {
        return $this->hasMany('App\novios_sacramento');
    }
}
