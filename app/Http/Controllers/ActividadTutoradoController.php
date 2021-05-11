<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GradoEscolar;
use App\ActividadTutorado;
use App\PreguntaTutorado;
use App\RespuestaTutorado;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class ActividadTutoradoController extends Controller
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
        return view('tutorado.index');
    }

    public function indexAdministrador($schoolGrade)
    {
        $gradosEscolares = GradoEscolar::orderBy('grado')->get();

        if ($schoolGrade == 'todas')
        {
//            if (!empty($buscar))
//            {
//                $actividadesTutorado = ActividadTutorado::where('nombre', 'LIKE', '%' . $buscar . '%')
//                                ->orderBy('semana')->paginate(12);
//            } else
//            {
            $actividadesTutorado = ActividadTutorado::orderBy('semana')->paginate(12);
//            }
            $gradoEscolar = 'Todas las actividades';
        } else
        {
            $idGradoEscolar = GradoEscolar::where('grado', '=', $schoolGrade)->first()->id;
//            if (!empty($buscar))
//            {
//                $actividadesTutorado = ActividadTutorado::where('id_gradoEscolar', '=', $idGradoEscolar->id)
//                                ->where('nombre', 'LIKE', '%' . $buscar . '%')
//                                ->orderBy('semana')->paginate(12);
//            } else
//            {
            $actividadesTutorado = ActividadTutorado::where('id_gradoEscolar', '=', $idGradoEscolar)
                            ->orderBy('semana')->paginate(12);
//            }
            $gradoEscolar = $schoolGrade;
        }
        return view('administrador.activity-student', [
            'gradosEscolares' => $gradosEscolares,
            'actividadesTutorado' => $actividadesTutorado,
            'gradoEscolarSelec' => $gradoEscolar
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gradosEscolares = GradoEscolar::orderBy('grado')->get();
        return view('administrador.create-activity-student', [
            'gradosEscolares' => $gradosEscolares
        ]);
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
            'gradoEscolar' => ['required', 'string', 'max:255'],
            'semana' => ['required', 'integer', 'min:1', 'max:25'],
            'nombre' => ['required', 'string', 'max:255', 'unique:actividades_tutorado'],
            'especialista' => ['required', 'string', 'max:255'],
            'imagen' => ['required', 'image', 'max:256000'],
            'objetivo' => ['required', 'string', 'max:1677215'],
            'instrucciones' => ['required', 'string', 'max:1677215'],
            'archivo' => ['max:256000'],
            'enlace' => ['string', 'max:1677215', 'nullable'],
            'pregunta' => ['required', 'string', 'max:1677215'],
        ]);

        $gradoEscolar = $request->input('gradoEscolar');
        $semana = $request->input('semana');
        $nombreActividad = $request->input('nombre');
        $imagen = $request->file('imagen');
        $objetivo = $request->input('objetivo');
        $instrucciones = $request->input('instrucciones');
        $archivo = $request->file('archivo');
        $enlace = $request->input('enlace');
        $especialista = $request->input('especialista');


        $actividadTutorado = new ActividadTutorado();

        $actividadTutorado->nombre = $nombreActividad;
        $actividadTutorado->objetivo = $objetivo;
        $actividadTutorado->instrucciones = $instrucciones;
        $actividadTutorado->enlace = $enlace;
        $actividadTutorado->semana = $semana;
        $actividadTutorado->especialista = $especialista;

        $gradosEscolares = GradoEscolar::where('grado', '=', $gradoEscolar)->first();
        $actividadTutorado->id_gradoEscolar = $gradosEscolares->id;

        if ($imagen)
        {
            $imagenNombre = time() . $imagen->getClientOriginalName();
            $imagenRedimensionada = Image::make($imagen);
            $imagenRedimensionada->resize(800, 533)->save(storage_path('app/actividad-tutorado/' . $imagenNombre));
            $actividadTutorado->imagen = $imagenNombre;
        }

        if (!empty($archivo))
        {
            $archivoNombre = time() . $archivo->getClientOriginalName();
            Storage::disk('archivos-tutorado')->put($archivoNombre, File::get($archivo));
            $actividadTutorado->archivo = $archivoNombre;
        }

        $actividadTutorado->save();

        $idActividad = $actividadTutorado->id;
        $pregunta = $request->input('pregunta');

        $preguntaTutorado = new PreguntaTutorado();
        $preguntaTutorado->id_actividadTutorado = $idActividad;
        $preguntaTutorado->pregunta = $pregunta;

        $preguntaTutorado->save();

        $incremento = 1;
        if ($request->input('preguntaAgregada' . $incremento) !== null)
        {
            do
            {
                $validate = $this->validate($request, [
                    'preguntaAgregada' . $incremento => ['required', 'string', 'max:1677215'],
                ]);

                $preguntaAgregada = $request->input('preguntaAgregada' . $incremento);

                $preguntaAgregarTutorado = new PreguntaTutorado();

                $preguntaAgregarTutorado->id_actividadTutorado = $idActividad;
                $preguntaAgregarTutorado->pregunta = $preguntaAgregada;

                $preguntaAgregarTutorado->save();

                $incremento++;
            } while ($request->input('preguntaAgregada' . $incremento) !== null);
        }

        return redirect()->route('admin.actividades-tutorado', ['schoolGrade' => 'todas'])
                        ->with(['message' => 'Actividad agregada']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $actividadTutorado = ActividadTutorado::find($id);
        return view('tutorado.activity-student', [
            'actividadTutorado' => $actividadTutorado
        ]);
    }
    
    public function showTutor($id)
    {
        $actividadTutorado = ActividadTutorado::find($id);
        return view('tutor.view-activity-student', [
            'actividadTutorado' => $actividadTutorado
        ]);
    }

    public function showFinished($id)
    {
        $actividadTutorado = ActividadTutorado::find($id);
        $preguntas = PreguntaTutorado::where('id_actividadTutorado', '=', $id)->pluck('id');
        $respuestas = RespuestaTutorado::where('id_tutorado', '=', \Auth::user()->tutorado->id)
                ->whereIn('id_preguntaTutorado', $preguntas)
                ->get();
        return view('tutorado.view-activity-student', [
            'actividadTutorado' => $actividadTutorado,
            'respuestas' => $respuestas
        ]);
    }
    
    public function showFinishedTutor($id, $idTutorado)
    {
        $actividadTutorado = ActividadTutorado::find($id);
        $preguntas = PreguntaTutorado::where('id_actividadTutorado', '=', $id)->pluck('id');
        $respuestas = RespuestaTutorado::where('id_tutorado', '=', $idTutorado)
                ->whereIn('id_preguntaTutorado', $preguntas)
                ->get();
        return view('tutor.view-activity-student-finished', [
            'actividadTutorado' => $actividadTutorado,
            'respuestas' => $respuestas
        ]);
    }

    public function showAdministrador($id)
    {
        $actividadTutorado = ActividadTutorado::find($id);
        return view('administrador.view-activity-student', [
            'actividadTutorado' => $actividadTutorado
        ]);
    }

    public function showActivityTutor($id)
    {
        return view('tutor.view-activity-student');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $actividadTutorado = ActividadTutorado::find($id);
        $pregunta = ActividadTutorado::find($id)
                ->preguntasTutorado
                ->first();

        $preguntasAgregadas = ActividadTutorado::find($id)
                ->preguntasTutorado
                ->where('id', '!=', $pregunta->id);
        $gradosEscolares = GradoEscolar::orderBy('grado')->get();
        if ($preguntasAgregadas == null)
        {
            return view('administrador.modify-activity-student', [
                'actividadTutorado' => $actividadTutorado,
                'pregunta' => $pregunta,
                'gradosEscolares' => $gradosEscolares
            ]);
        } else
        {
            return view('administrador.modify-activity-student', [
                'actividadTutorado' => $actividadTutorado,
                'pregunta' => $pregunta,
                'preguntasAgregadas' => $preguntasAgregadas,
                'gradosEscolares' => $gradosEscolares
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idActividad, $idPregunta)
    {
        $validate = $this->validate($request, [
            'gradoEscolar' => ['required', 'string', 'max:255'],
            'semana' => ['required', 'integer', 'min:1', 'max:25'],
            'nombre' => ['required', 'string', 'max:255', Rule::unique('actividades_tutorado')->ignore($idActividad),],
            'especialista' => ['required', 'string', 'max:255'],
            'imagen' => ['image', 'max:256000'],
            'objetivo' => ['required', 'string', 'max:1677215'],
            'instrucciones' => ['required', 'string', 'max:1677215'],
            'archivo' => ['max:256000'],
            'enlace' => ['string', 'max:1677215', 'nullable'],
            'pregunta' => ['required', 'string', 'max:1677215'],
        ]);

        $gradoEscolar = $request->input('gradoEscolar');
        $nombreActividad = $request->input('nombre');
        $imagen = $request->file('imagen');
        $objetivo = $request->input('objetivo');
        $instrucciones = $request->input('instrucciones');
        $archivo = $request->file('archivo');
        $enlace = $request->input('enlace');
        $semana = $request->input('semana');
        $especialista = $request->input('especialista');

        $actividadTutorado = ActividadTutorado::find($idActividad);

        $actividadTutorado->nombre = $nombreActividad;
        $actividadTutorado->objetivo = $objetivo;
        $actividadTutorado->instrucciones = $instrucciones;
        $actividadTutorado->enlace = $enlace;
        $actividadTutorado->especialista = $especialista;
        $actividadTutorado->semana = $semana;
        $gradosEscolares = GradoEscolar::where('grado', '=', $gradoEscolar)->first();
        $actividadTutorado->id_gradoEscolar = $gradosEscolares->id;

        if ($imagen)
        {
            $imagenNombre = time() . $imagen->getClientOriginalName();
            $imagenRedimensionada = Image::make($imagen);
            $imagenRedimensionada->resize(800, 533)->save(storage_path('app/actividad-tutorado/' . $imagenNombre));
            Storage::disk('actividad-tutorado')->delete($actividadTutorado->imagen);
            $actividadTutorado->imagen = $imagenNombre;
        }

        if ($archivo)
        {
            $archivoNombre = time() . $archivo->getClientOriginalName();
            Storage::disk('archivos-tutorado')->put($archivoNombre, File::get($archivo));
            Storage::disk('archivos-tutorado')->delete($actividadTutorado->archivo);
            $actividadTutorado->archivo = $archivoNombre;
        }

        $actividadTutorado->update();

        $pregunta = $request->input('pregunta');

        $preguntaTutorado = PreguntaTutorado::find($idPregunta);
        $preguntaTutorado->pregunta = $pregunta;

        $preguntaTutorado->update();

        $preguntasAgregadas = ActividadTutorado::find($idActividad)
                ->preguntasTutorado
                ->where('id', '!=', $idPregunta);

        if ($preguntasAgregadas != null)
        {
            foreach ($preguntasAgregadas as $preguntaAgregadaM)
            {
                $validate = $this->validate($request, [
                    'preguntaAgregada' . $preguntaAgregadaM->id => ['required', 'string', 'max:1677215'],
                ]);
                $inputPregunta = $request->input('preguntaAgregada' . $preguntaAgregadaM->id);
                $objPregunta = PreguntaTutorado::find($preguntaAgregadaM->id);
                $objPregunta->pregunta = $inputPregunta;

                $objPregunta->update();
            }
        }

        $incremento = 1;
        if ($request->input('preguntaAgregada' . $incremento) !== null)
        {
            do
            {
                $validate = $this->validate($request, [
                    'preguntaAgregada' . $incremento => ['required', 'string', 'max:1677215'],
                ]);

                $preguntaAgregada = $request->input('preguntaAgregada' . $incremento);

                $preguntaAgregarTutorado = new PreguntaTutorado();

                $preguntaAgregarTutorado->id_actividadTutorado = $idActividad;
                $preguntaAgregarTutorado->pregunta = $preguntaAgregada;

                $preguntaAgregarTutorado->save();

                $incremento++;
            } while ($request->input('preguntaAgregada' . $incremento) !== null);
        }

        return redirect()->route('admin.actividades-tutorado', ['schoolGrade' => 'todas'])
                        ->with(['message' => 'Actividad actualizada']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actividadTutorado = ActividadTutorado::find($id);

        Storage::disk('actividad-tutorado')->delete($actividadTutorado->imagen);
        if ($actividadTutorado->archivo != null)
        {
            Storage::disk('archivos-tutorado')->delete($actividadTutorado->archivo);
        }
        $actividadTutorado->delete();
        return redirect()->route('admin.actividades-tutorado', ['schoolGrade' => 'todas'])
                        ->with(['message' => 'Actividad eliminada']);
    }

    public function getImage($filename)
    {
        $file = Storage::disk('actividad-tutorado')->get($filename);
        return new Response($file, 200);
    }

    public function getFile($filename)
    {
        return Storage::download("archivos-tutorado/$filename");
    }

}
