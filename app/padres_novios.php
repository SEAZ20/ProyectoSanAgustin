<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class padres_novios extends Model
{
    public $table = "padres_novios";
    public $timestamps = false;
    protected $fillable = ['nombres_p_novio', 'apellidos_p_novio', 'nombres_m_novio', 'apellidos_m_novio', 'nombres_p_novia', 'apellidos_p_novia', 'nombres_m_novia', 'apellidos_m_novia'];
    public function novios()
    {
        return $this->hasMany('App\novios');
    }
}
