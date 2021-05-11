<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ActividadTutor;
use App\RespuestaTutor;
use App\AsignacionTutor;

class RespuestaTutorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $idActividad)
    {
        $actividadTutor = ActividadTutor::find($idActividad);
        foreach ($actividadTutor->preguntasTutor as $pregunta)
        {
            $validate = $this->validate($request, [
                'respuesta' . $pregunta->id => ['required', 'string', 'max:1677215'],
            ]);

            $respuesta = $request->input('respuesta' . $pregunta->id);

            $respuestaTutor = new RespuestaTutor();

            $respuestaTutor->id_preguntaTutor = $pregunta->id;
            $respuestaTutor->id_tutor = \Auth::user()->tutor->id;
            $respuestaTutor->respuesta = $respuesta;

            $respuestaTutor->save();
        }
        $asignacionTutor = AsignacionTutor::where('id_tutor', '=', \Auth::user()->tutor->id)
                ->where('id_actividadTutor', '=', $idActividad)
                ->first();
        $asignacionTutor->estatus = 1;
        $asignacionTutor->update();

        return redirect()->route('tutor.actividades');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
