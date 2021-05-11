<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RespuestaTutor extends Model
{

    public $timestamps = false;
    protected $table = 'respuestas_tutor';
    
    public function preguntaTutor()
    {
        return $this->belongsTo('App\PreguntaTutor', 'id_preguntaTutor');
    }

    public function tutor()
    {
        return $this->belongsTo('App\Tutor', 'id_tutor');
    }
}
