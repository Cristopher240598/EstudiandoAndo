<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GradoEscolar;
use Illuminate\Validation\Rule;

class GradoEscolarController extends Controller
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

    public function indexAdministrador($buscar = null)
    {
        if (!empty($buscar))
        {
            $gradosEscolares = GradoEscolar::where('grado', 'LIKE', '%' . $buscar . '%')
                            ->orderBy('grado')->paginate(10);
        } else
        {
            $gradosEscolares = GradoEscolar::orderBy('grado')->paginate(10);
        }
        return view('administrador.school-grade', [
            'gradosEscolares' => $gradosEscolares
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrador.create-school-grade');
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
            'grado' => ['required', 'string', 'max:255', 'unique:grados_escolares'],
        ]);

        $gradoEscolar = $request->input('grado');

        $grado = new GradoEscolar();
        $grado->grado = $gradoEscolar;

        $grado->save();

        return redirect()->route('admin.grado-escolar')
                        ->with(['message' => 'Grado escolar agregado']);
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
        $gradoEscolar = GradoEscolar::find($id);

        return view('administrador.modify-school-grade', [
            'gradoEscolar' => $gradoEscolar
        ]);
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
        $validate = $this->validate($request, [
            'grado' => ['required', 'string', 'max:255', Rule::unique('grados_escolares')->ignore($id),],
        ]);

        $gradoEscolar = $request->input('grado');

        $grado = GradoEscolar::find($id);
        $grado->grado = $gradoEscolar;

        $grado->update();

        return redirect()->route('admin.grado-escolar')
                        ->with(['message' => 'Grado escolar actualizado']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gradoEscolar = GradoEscolar::find($id);
        $gradoEscolar->delete();

        return redirect()->route('admin.grado-escolar')
                        ->with(['message' => 'Grado escolar eliminado']);
    }

}
