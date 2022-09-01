<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sacramento extends Model
{
    public $table = "sacramentos";
    public $timestamps = false;
    protected $fillable = ['sacramento'];

    public function persona_sacramentobautizo()
    {
        return $this->hasMany('App\persona_sacramentobautizo');
    }
    public function padrino()
    {
        return $this->hasMany('App\padrino', 'sacramento_id');
    }
    public function persona_sacramentocomunion()
    {
        return $this->hasMany('App\persona_sacramentocomunion');
    }
    public function novios_sacramento()
    {
        return $this->hasMany('App\novios_sacramento');
    }
}
