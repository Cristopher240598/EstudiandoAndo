<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SugerenciaComentario;
use Illuminate\Validation\Rule;

class SugerenciaComentarioController extends Controller
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
        return view('tutor.suggestions-comments');
    }

    public function indexAdministrador()
    {
        $sugCom_Tutores = SugerenciaComentario::where('tema', '=', 'Tutores')
                        ->orderBy('id')->paginate(10);
        $sugCom_Tutorados = SugerenciaComentario::where('tema', '=', 'Tutorados')
                        ->orderBy('id')->paginate(10);
        $sugCom_Actividades = SugerenciaComentario::where('tema', '=', 'Actividades')
                        ->orderBy('id')->paginate(10);
        $sugCom_Foros = SugerenciaComentario::where('tema', '=', 'Foros')
                        ->orderBy('id')->paginate(10);
        $sugCom_Otros = SugerenciaComentario::where('tema', '=', 'Otro')
                        ->orderBy('id')->paginate(10);
        return view('administrador.suggestions-comments', [
            'tutores' => $sugCom_Tutores,
            'tutorados' => $sugCom_Tutorados,
            'actividades' => $sugCom_Actividades,
            'foros' => $sugCom_Foros,
            'otros' => $sugCom_Otros,
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
        $validate = $this->validate($request, [
            'tema' => ['required', 'string', 'max:255', Rule::in(['Tutores', 'Tutorados', 'Actividades', 'Foros', 'Otro']),],
            'texto' => ['required', 'string', 'max:1677215'],
        ]);

        $tema = $request->input('tema');
        $texto = $request->input('texto');

        $sugerenciaComentario = new SugerenciaComentario();

        $sugerenciaComentario->id_tutor = \Auth::user()->tutor->id;
        $sugerenciaComentario->tema = $tema;
        $sugerenciaComentario->texto = $texto;

        $sugerenciaComentario->save();

        return redirect()->route('tutor.sug-com')
                        ->with(['message' => 'Sugerencia/Comentario enviado']);
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
        $sugCom = SugerenciaComentario::find($id);
        
        $sugCom->delete();
        
        return redirect()->route('admin.sug-com')
                        ->with(['message' => 'Sugerencia/Comentario eliminado']);
    }

}
