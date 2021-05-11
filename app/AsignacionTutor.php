<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsignacionTutor extends Model
{

    public $timestamps = false;
    protected $table = 'asignaciones_tutor';

    public function tutor()
    {
        return $this->belongsTo('App\Tutor', 'id_tutor');
    }

    public function actividadTutor()
    {
        return $this->belongsTo('App\ActividadTutor', 'id_actividadTutor');
    }

}
