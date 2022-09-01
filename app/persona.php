<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class persona extends Model
{
    public $table = "persona";
    public $timestamps = false;
    protected $fillable = [
        'nombres', 'apellidos', 'slug', 'padre_id'
    ];
    public function padres()
    {
        return $this->belongsTo('App\padre', 'padre_id');
    }
    public function padrino()
    {
        return $this->hasMany('App\padrino');
    }
    public function persona_sacramentobautizo()
    {
        return $this->hasMany('App\persona_sacramentobautizo');
    }
    public function persona_sacramentocomunion()
    {
        return $this->hasMany('App\persona_sacramentocomunion');
    }
    public function persona_sacramentoconfirma()
    {
        return $this->hasMany('App\persona_sacramentoconfirma');
    }
}
