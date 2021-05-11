<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SugerenciaComentario extends Model
{

    public $timestamps = false;
    protected $table = 'sugerencias_comentarios';

    public function tutor()
    {
        return $this->belongsTo('App\Tutor', 'id_tutor');
    }

}
