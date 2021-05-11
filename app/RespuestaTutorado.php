<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RespuestaTutorado extends Model
{

    public $timestamps = false;
    protected $table = 'respuestas_tutorado';

    public function preguntaTutorado()
    {
        return $this->belongsTo('App\PreguntaTutorado', 'id_preguntaTutorado');
    }

    public function tutorado()
    {
        return $this->belongsTo('App\Tutorado', 'id_tutorado');
    }

}
