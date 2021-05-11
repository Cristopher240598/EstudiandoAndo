<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ActividadTutor;
use App\PreguntaTutor;
use App\GradoEscolar;
use App\RespuestaTutor;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class ActividadTutorController extends Controller
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
        return view('tutor.index');
    }

    public function indexAdministrador($schoolGrade)
    {
        $rol = \Auth::user()->rol;
        if ($rol == 'administrador')
        {
            $gradosEscolares = GradoEscolar::orderBy('grado')->get();
            if ($schoolGrade == 'todas')
            {
//            if (!empty($buscar))
//            {
//                $actividadesTutor = ActividadTutor::where('nombre', 'LIKE', '%' . $buscar . '%')
//                                ->orderBy('mes')->paginate(12);
//            } else
//            {
                $actividadesTutor = ActividadTutor::orderBy('mes')->paginate(12);
                $gradoEscolar = 'Todas las actividades';
//            }
            } else
            {
                $idGradoEscolar = GradoEscolar::where('grado', '=', $schoolGrade)->first()->id;
                $actividadesTutor = ActividadTutor::where('id_gradoEscolar', '=', $idGradoEscolar)
                                ->orderBy('mes')->paginate(12);
                $gradoEscolar = $schoolGrade;
            }
            return view('administrador.activity-tutor', [
                'gradosEscolares' => $gradosEscolares,
                'actividadesTutor' => $actividadesTutor,
                'gradoEscolarSelec' => $gradoEscolar
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gradosEscolares = GradoEscolar::orderBy('grado')->get();
        return view('administrador.create-activity-tutor', [
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
            'mes' => ['required', 'integer', 'min:1', 'max:6'],
            'nombre' => ['required', 'string', 'max:255', 'unique:actividades_tutor'],
            'especialista' => ['required', 'string', 'max:255'],
            'imagen' => ['required', 'image', 'max:256000'],
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
        $especialista = $request->input('especialista');
        $instrucciones = $request->input('instrucciones');
        $archivo = $request->file('archivo');
        $enlace = $request->input('enlace');
        $mes = $request->input('mes');

        $actividadTutor = new ActividadTutor();

        $actividadTutor->nombre = $nombreActividad;
        $actividadTutor->objetivo = $objetivo;
        $actividadTutor->especialista = $especialista;
        $actividadTutor->instrucciones = $instrucciones;
        $actividadTutor->enlace = $enlace;
        $actividadTutor->mes = $mes;

        $gradosEscolares = GradoEscolar::where('grado', '=', $gradoEscolar)->first();
        $actividadTutor->id_gradoEscolar = $gradosEscolares->id;

        if ($imagen)
        {
            $imagenNombre = time() . $imagen->getClientOriginalName();
            $imagenRedimensionada = Image::make($imagen);
            $imagenRedimensionada->resize(800, 533)->save(storage_path('app/actividad-tutor/' . $imagenNombre));
            $actividadTutor->imagen = $imagenNombre;
        }

        if (!empty($archivo))
        {
            $archivoNombre = time() . $archivo->getClientOriginalName();
            Storage::disk('archivos-tutor')->put($archivoNombre, File::get($archivo));
            $actividadTutor->archivo = $archivoNombre;
        }

        $actividadTutor->save();


        $idActividad = $actividadTutor->id;
        $pregunta = $request->input('pregunta');

        $preguntaTutor = new PreguntaTutor();
        $preguntaTutor->id_actividadTutor = $idActividad;
        $preguntaTutor->pregunta = $pregunta;

        $preguntaTutor->save();

        $incremento = 1;
        if ($request->input('preguntaAgregada' . $incremento) !== null)
        {
            do
            {
                $validate = $this->validate($request, [
                    'preguntaAgregada' . $incremento => ['required', 'string', 'max:1677215'],
                ]);

                $preguntaAgregada = $request->input('preguntaAgregada' . $incremento);

                $preguntaAgregarTutor = new PreguntaTutor();

                $preguntaAgregarTutor->id_actividadTutor = $idActividad;
                $preguntaAgregarTutor->pregunta = $preguntaAgregada;

                $preguntaAgregarTutor->save();

                $incremento++;
            } while ($request->input('preguntaAgregada' . $incremento) !== null);
        }

        return redirect()->route('admin.actividades-tutor', ['schoolGrade' => 'todas'])
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
        $actividadTutor = ActividadTutor::find($id);
        return view('tutor.activity-tutor', [
            'actividadTutor' => $actividadTutor
        ]);
    }

    public function showFinished($id)
    {
        $actividadTutor = ActividadTutor::find($id);
        $preguntas = PreguntaTutor::where('id_actividadTutor', '=', $id)->pluck('id');
        $respuestas = RespuestaTutor::where('id_tutor', '=', \Auth::user()->tutor->id)
                ->whereIn('id_preguntaTutor', $preguntas)
                ->get();
        return view('tutor.view-activity-tutor', [
            'actividadTutor' => $actividadTutor,
            'respuestas' => $respuestas
        ]);
    }

    public function showAdministrador($id)
    {
        $actividadTutor = ActividadTutor::find($id);
        return view('administrador.view-activity-tutor', [
            'actividadTutor' => $actividadTutor
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
        $actividadTutor = ActividadTutor::find($id);
        $pregunta = ActividadTutor::find($id)
                ->preguntasTutor
                ->first();

        $preguntasAgregadas = ActividadTutor::find($id)
                ->preguntasTutor
                ->where('id', '!=', $pregunta->id);
        $gradosEscolares = GradoEscolar::orderBy('grado')->get();
        if ($preguntasAgregadas == null)
        {
            return view('administrador.modify-activity-tutor', [
                'actividadTutor' => $actividadTutor,
                'pregunta' => $pregunta,
                'gradosEscolares' => $gradosEscolares
            ]);
        } else
        {
            return view('administrador.modify-activity-tutor', [
                'actividadTutor' => $actividadTutor,
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
            'mes' => ['required', 'integer', 'min:1', 'max:6'],
            'nombre' => ['required', 'string', 'max:255', Rule::unique('actividades_tutor')->ignore($idActividad),],
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
        $mes = $request->input('mes');
        $especialista = $request->input('especialista');

        $actividadTutor = ActividadTutor::find($idActividad);

        $actividadTutor->nombre = $nombreActividad;
        $actividadTutor->objetivo = $objetivo;
        $actividadTutor->instrucciones = $instrucciones;
        $actividadTutor->enlace = $enlace;
        $actividadTutor->mes = $mes;
        $actividadTutor->especialista = $especialista;
        $gradosEscolares = GradoEscolar::where('grado', '=', $gradoEscolar)->first();
        $actividadTutor->id_gradoEscolar = $gradosEscolares->id;

        if ($imagen)
        {
            $imagenNombre = time() . $imagen->getClientOriginalName();
            $imagenRedimensionada = Image::make($imagen);
            $imagenRedimensionada->resize(800, 533)->save(storage_path('app/actividad-tutor/' . $imagenNombre));
            Storage::disk('actividad-tutor')->delete($actividadTutor->imagen);
            $actividadTutor->imagen = $imagenNombre;
        }

        if ($archivo)
        {
            $archivoNombre = time() . $archivo->getClientOriginalName();
            Storage::disk('archivos-tutor')->put($archivoNombre, File::get($archivo));
            Storage::disk('archivos-tutor')->delete($actividadTutor->archivo);
            $actividadTutor->archivo = $archivoNombre;
        }

        $actividadTutor->update();

        $pregunta = $request->input('pregunta');

        $preguntaTutor = PreguntaTutor::find($idPregunta);
        $preguntaTutor->pregunta = $pregunta;

        $preguntaTutor->update();

        $preguntasAgregadas = ActividadTutor::find($idActividad)
                ->preguntasTutor
                ->where('id', '!=', $idPregunta);

        if ($preguntasAgregadas != null)
        {
            foreach ($preguntasAgregadas as $preguntaAgregadaM)
            {
                $validate = $this->validate($request, [
                    'preguntaAgregada' . $preguntaAgregadaM->id => ['required', 'string', 'max:1677215'],
                ]);
                $inputPregunta = $request->input('preguntaAgregada' . $preguntaAgregadaM->id);
                $objPregunta = PreguntaTutor::find($preguntaAgregadaM->id);
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

                $preguntaAgregarTutor = new PreguntaTutor();

                $preguntaAgregarTutor->id_actividadTutor = $idActividad;
                $preguntaAgregarTutor->pregunta = $preguntaAgregada;

                $preguntaAgregarTutor->save();

                $incremento++;
            } while ($request->input('preguntaAgregada' . $incremento) !== null);
        }

        return redirect()->route('admin.actividades-tutor', ['schoolGrade' => 'todas'])
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
        $actividadTutor = ActividadTutor::find($id);
        Storage::disk('actividad-tutor')->delete($actividadTutor->imagen);
        if ($actividadTutor->archivo != null)
        {
            Storage::disk('archivos-tutor')->delete($actividadTutor->archivo);
        }
        $actividadTutor->delete();
        return redirect()->route('admin.actividades-tutor', ['schoolGrade' => 'todas'])
                        ->with(['message' => 'Actividad eliminada']);
    }

    public function getImage($filename)
    {
        $file = Storage::disk('actividad-tutor')->get($filename);
        return new Response($file, 200);
    }

    public function getFile($filename)
    {
        return Storage::download("archivos-tutor/$filename");
    }

}
