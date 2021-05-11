<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{

    public $timestamps = false;
    protected $table = 'temas';

    public function tutor()
    {
        return $this->belongsTo('App\Tutor', 'id_tutor');
    }

    public function comentarios()
    {
        return $this->hasMany('App\Comentario', 'id_tema');
    }

}
