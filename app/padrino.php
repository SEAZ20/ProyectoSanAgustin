<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class padrino extends Model
{
    public $table = "padrinos";
    public $timestamps = false;
    protected $fillable = ['nombre_padrino', 'apellidos_padrino', 'persona_id', 'sacramento_id'];
    public function persona()
    {
        return $this->belongsTo('App\persona');
    }
    public function sacramento()
    {
        return $this->belongsTo('App\sacramento', 'sacramento_id');
    }
}
