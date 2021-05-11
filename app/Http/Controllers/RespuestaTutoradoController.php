<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ActividadTutorado;
use App\RespuestaTutorado;
use App\AsignacionTutorado;

class RespuestaTutoradoController extends Controller
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
        $actividadTutorado = ActividadTutorado::find($idActividad);
        foreach ($actividadTutorado->preguntasTutorado as $pregunta)
        {
            $validate = $this->validate($request, [
                'respuesta' . $pregunta->id => ['required', 'string', 'max:1677215'],
            ]);

            $respuesta = $request->input('respuesta' . $pregunta->id);

            $respuestaTutorado = new RespuestaTutorado();

            $respuestaTutorado->id_preguntaTutorado = $pregunta->id;
            $respuestaTutorado->id_tutorado = \Auth::user()->tutorado->id;
            $respuestaTutorado->respuesta = $respuesta;

            $respuestaTutorado->save();
        }
        $asignacionTutorado = AsignacionTutorado::where('id_tutorado', '=', \Auth::user()->tutorado->id)
                ->where('id_actividadTutorado', '=', $idActividad)
                ->first();
        $asignacionTutorado->estatus = 1;

        $fecha = new \DateTime();

        $asignacionTutorado->fechaHora = $fecha;
        $asignacionTutorado->update();

        return redirect()->route('tutorado.actividades');
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
