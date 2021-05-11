<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreguntaTutor extends Model
{

    public $timestamps = false;
    protected $table = 'preguntas_tutor';

    public function actividadesTutor()
    {
        return $this->belongsTo('App\ActividadTutor', 'id_actividadTutor');
    }
    
    public function respuestasTutor()
    {
        return $this->hasMany('App\RespuestaTutor', 'id_preguntaTutor');
    }

}
