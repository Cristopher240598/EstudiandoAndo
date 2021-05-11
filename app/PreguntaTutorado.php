<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreguntaTutorado extends Model
{

    public $timestamps = false;
    protected $table = 'preguntas_tutorado';

    public function actividadTutorado()
    {
        return $this->belongsTo('App\ActividadTutorado', 'id_actividadTutorado');
    }
    
    public function respuestasTutorado()
    {
        return $this->hasMany('App\RespuestaTutorado', 'id_preguntaTutorado');
    }

}
