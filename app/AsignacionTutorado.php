<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsignacionTutorado extends Model
{

    public $timestamps = false;
    protected $table = 'asignaciones_tutorado';

    public function tutorado()
    {
        return $this->belongsTo('App\Tutorado', 'id_tutorado');
    }

    public function actividadTutorado()
    {
        return $this->belongsTo('App\ActividadTutorado', 'id_actividadTutorado');
    }

}
