<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class novios_sacramento extends Model
{
    public $table = 'novios_sacramento';
    public $timestamps = false;
    protected $fillable = [
        'ecle_anio', 'ecle_tomo', 'ecle_pagina', 'ecle_no', 'civil_anio', 'civil_tomo', 'civil_pagina',
        'civil_no', 'civil_ciudad', 'civil_partida', 'dia_ma', 'mes_ma', 'anio_ma', 'novios_id', 'sacramento_id'
    ];
    public function novios()
    {
        return $this->belongsTo('App\novios');
    }
    public function sacramento()
    {
        return $this->belongsTo('App\sacramento');
    }
}
