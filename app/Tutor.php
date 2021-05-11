<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{

    public $timestamps = false;
    protected $table = 'tutores';

    public function usuario()
    {
        return $this->belongsTo('App\User', 'id_usuario');
    }

    public function tutorados()
    {
        return $this->hasMany('App\Tutorado', 'id_tutor');
    }

    public function sugerenciasComentarios()
    {
        return $this->hasMany('App\SugerenciaComentario', 'id_tutor');
    }

    public function temas()
    {
        return $this->hasMany('App\Tema', 'id_tutor');
    }

    public function comentarios()
    {
        return $this->hasMany('App\Comentario', 'id_tutor');
    }

    public function asignacionesTutor()
    {
        return $this->hasMany('App\AsignacionTutor', 'id_tutor');
    }

    public function respuestasTutor()
    {
        return $this->hasMany('App\RespuestaTutor', 'id_tutor');
    }

    public function gradoEscolar()
    {
        return $this->belongsTo('App\GradoEscolar', 'id_gradoEscolar');
    }

}
