<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutorado extends Model
{

    public $timestamps = false;
    protected $table = 'tutorados';

    public function usuario()
    {
        return $this->belongsTo('App\User', 'id_usuario');
    }

    public function tutor()
    {
        return $this->belongsTo('App\Tutor', 'id_tutor');
    }

    public function asignacionesTutorado()
    {
        return $this->hasMany('App\AsignacionTutorado', 'id_tutorado');
    }

    public function gradoEscolar()
    {
        return $this->belongsTo('App\GradoEscolar', 'id_gradoEscolar');
    }
    
    public function preguntasTutorado()
    {
        return $this->hasMany('App\PreguntaTutorado', 'id_tutorado');
    }

}
