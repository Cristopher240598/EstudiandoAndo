<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{

    public $timestamps = false;
    protected $table = 'comentarios';

    public function tutor()
    {
        return $this->belongsTo('App\Tutor', 'id_tutor');
    }

    public function tema()
    {
        return $this->belongsTo('App\Tema', 'id_tema');
    }

}
