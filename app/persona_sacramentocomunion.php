<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class persona_sacramentocomunion extends Model
{
    public $table = 'persona_sacramentocomunion';
    public $timestamps = false;
    protected $fillable = [
        'dia_sa', 'mes_sa', 'anio_sa', 'ciudad_sa',
        'ecle_anio', 'ecle_tomo', 'ecle_pagina', 'ecle_no', 'civil_anio', 'civil_tomo', 'civil_pagina',
        'civil_no', 'civil_parroquia', 'dia_co', 'mes_co', 'anio_co', 'parroco_comunion', 'nota', 'persona_id', 'sacramento_id'
    ];
    public function persona()
    {
        return $this->belongsTo('App\persona');
    }
    public function sacramento()
    {
        return $this->belongsTo('App\sacramento');
    }
}
