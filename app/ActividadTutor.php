<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActividadTutor extends Model
{

    public $timestamps = false;
    protected $table = 'actividades_tutor';

    public function asignacionesTutor()
    {
        return $this->hasMany('App\AsignacionTutor', 'id_actividadTutor');
    }

    public function preguntasTutor()
    {
        return $this->hasMany('App\PreguntaTutor', 'id_actividadTutor');
    }
    
    public function gradoEscolar()
    {
        return $this->belongsTo('App\GradoEscolar', 'id_gradoEscolar');
    }

}
