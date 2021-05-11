<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AsignacionTutorado;
use App\Tutorado;


class AsignacionTutoradoController extends Controller
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
        $idUsuario = \Auth::user()->tutorado->id;
        $asignacion = AsignacionTutorado::where('id_tutorado', '=', $idUsuario)->paginate(4);
        $totalActividades = AsignacionTutorado::where('id_tutorado', '=', $idUsuario)->count();
        $totalActividadesTerminadas = AsignacionTutorado::where('id_tutorado', '=', $idUsuario)
                ->where('estatus', '!=', NULL)
                ->count();
        return view('tutorado.index', [
            'asignacion' => $asignacion,
            'totalActividades' => $totalActividades,
            'totalActividadesTerminadas' => $totalActividadesTerminadas
        ]);
    }
    
    public function indexTutor($idTutorado)
    {
        $asignacion = AsignacionTutorado::where('id_tutorado', '=', $idTutorado)->paginate(4);
        $totalActividades = AsignacionTutorado::where('id_tutorado', '=', $idTutorado)->count();
        $tutorado = Tutorado::find($idTutorado);
        $totalActividadesTerminadas = AsignacionTutorado::where('id_tutorado', '=', $idTutorado)
                ->where('estatus', '!=', NULL)
                ->count();
        return view('tutor.view-student', [
            'asignacion' => $asignacion,
            'totalActividades' => $totalActividades,
            'totalActividadesTerminadas' => $totalActividadesTerminadas,
            'tutorado' => $tutorado
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
