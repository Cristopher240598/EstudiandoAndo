<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActividadTutorado extends Model
{

    public $timestamps = false;
    protected $table = 'actividades_tutorado';

    public function asignacionesTutorado()
    {
        return $this->hasMany('App\AsignacionTutorado', 'id_actividadTutorado');
    }

    public function preguntasTutorado()
    {
        return $this->hasMany('App\PreguntaTutorado', 'id_actividadTutorado');
    }

    public function gradoEscolar()
    {
        return $this->belongsTo('App\GradoEscolar', 'id_gradoEscolar');
    }

}
