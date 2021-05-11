<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GradoEscolar extends Model
{

    public $timestamps = false;
    protected $table = 'grados_escolares';

    public function tutorado()
    {
        return $this->hasMany('App\Tutorado', 'id_gradoEscolar');
    }
    
    public function tutor()
    {
        return $this->hasMany('App\Tutor', 'id_gradoEscolar');
    }

    public function actividadesTutorado()
    {
        return $this->hasMany('App\ActividadTutorado', 'id_gradoEscolar');
    }
    
    public function actividadesTutor()
    {
        return $this->hasMany('App\ActividadTutor', 'id_gradoEscolar');
    }

}
