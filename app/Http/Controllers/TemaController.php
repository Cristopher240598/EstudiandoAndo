<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tema;
use Illuminate\Support\Carbon;

class TemaController extends Controller
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
        return view('tutor.forums-index');
    }

    public function indexMyForums($buscar = null)
    {
        $idTutor = \Auth::user()->tutor->id;

        if (!empty($buscar))
        {
            $misForos = Tema::where('tema', 'LIKE', '%' . $buscar . '%')
                            ->where('id_tutor', '=', $idTutor)
                            ->orderBY('tema')->paginate(15);
        } else
        {
            $misForos = Tema::where('id_tutor', '=', $idTutor)
                            ->orderBY('tema')->paginate(15);
        }

        return view('tutor.my-forums', [
            'misForos' => $misForos
        ]);
    }

    public function indexForums($buscar = null)
    {
        $idTutor = \Auth::user()->tutor->id;

        if (!empty($buscar))
        {
            $foros = Tema::where('tema', 'LIKE', '%' . $buscar . '%')
                            ->where('id_tutor', '!=', $idTutor)
                            ->orderBY('tema')->paginate(15);
        } else
        {
            $foros = Tema::where('id_tutor', '!=', $idTutor)
                            ->orderBY('tema')->paginate(15);
        }

        return view('tutor.forums', [
            'foros' => $foros
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tutor.create-forum');
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
            'tema' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string', 'max:1677215'],
        ]);

        $tema = $request->input('tema');
        $descripcion = $request->input('descripcion');

        $temaForo = new Tema();

        $temaForo->id_tutor = \Auth::user()->tutor->id;
        $temaForo->tema = $tema;
        $temaForo->descripcion = $descripcion;

        $fecha = new \DateTime();

        $temaForo->fechaHora = $fecha;

        $temaForo->save();

        return redirect()->route('tutor.mis-foros')
                        ->with(['message' => 'Foro agregado']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $foro = Tema::find($id);
        return view('tutor.forum', [
            'foro' => $foro
        ]);
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
        $tema = Tema::find($id);

        $tema->delete();

        return redirect()->route('tutor.mis-foros')
                        ->with(['message' => 'Foro eliminado']);
    }

}
