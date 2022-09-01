<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class persona_sacramentobautizo extends Model
{
    public $table = 'persona_sacramentobautizo';
    public $timestamps = false;
    protected $fillable = [
        'dia_nac', 'mes_nac', 'anio_nac', 'ciudad_nac',
        'ecle_anio', 'ecle_tomo', 'ecle_pagina', 'ecle_no', 'civil_anio', 'civil_tomo', 'civil_pagina',
        'civil_no', 'civil_parroquia', 'dia_sa', 'mes_sa', 'anio_sa', 'parroco', 'nota', 'edad_bautizo', 'persona_id', 'sacramento_id'
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
