<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AsignacionTutor;
use App\ActividadTutor;

class AsignacionTutorController extends Controller
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
        $idUsuario = \Auth::user()->tutor->id;
        $asignacion = AsignacionTutor::where('id_tutor', '=', $idUsuario)->paginate(4);
        $totalActividades = AsignacionTutor::where('id_tutor', '=', $idUsuario)->count();
        $totalActividadesTerminadas = AsignacionTutor::where('id_tutor', '=', $idUsuario)
                ->where('estatus', '!=', NULL)
                ->count();
        return view('tutor.index', [
            'asignacion' => $asignacion,
            'totalActividades' => $totalActividades,
            'totalActividadesTerminadas' => $totalActividadesTerminadas
        ]);
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
    public function store(Request $request)
    {
        //
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
