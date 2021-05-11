<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GradoEscolar;
use App\User;
use App\Tutor;
use App\Tutorado;
use App\ActividadTutor;
use App\ActividadTutorado;
use App\AsignacionTutor;
use App\AsignacionTutorado;
use Illuminate\Support\Facades\Hash;

class TutoradoController extends Controller
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
        
    }

    public function indexTutor()
    {
        $tutor = \Auth::user()->tutor->id;
        $tutorados = Tutorado::where('id_tutor', '=', $tutor)->get();
        return view('tutor.students', [
            'tutorados' => $tutorados
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
        return view('tutor.create-student', [
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
            'nombre' => ['required', 'string', 'max:255'],
            'apellidoPaterno' => ['required', 'string', 'max:30'],
            'apellidoMaterno' => ['required', 'string', 'max:30'],
            'gradoEscolar' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $nombre = $request->input('nombre');
        $apellidoPaterno = $request->input('apellidoPaterno');
        $apellidoMaterno = $request->input('apellidoMaterno');
        $gradoEscolar = $request->input('gradoEscolar');
        $email = self::generarEmail($nombre);
        $password = $request->input('password');

        $usuario = new User();

        $usuario->nombre = $nombre;
        $usuario->apellidoPaterno = $apellidoPaterno;
        $usuario->apellidoMaterno = $apellidoMaterno;
        $usuario->email = $email;
        $usuario->password = Hash::make($password);
        $usuario->rol = 'tutorado';

        $usuario->save();

        $idGradoEscolar = GradoEscolar::where('grado', '=', $gradoEscolar)->first();
        $tutor = \Auth::user()->tutor;

        $tutorado = new Tutorado();
        $tutorado->id_tutor = $tutor->id;
        $tutorado->id_usuario = $usuario->id;
        $tutorado->id_gradoEscolar = $idGradoEscolar->id;

        $tutorado->save();

        self::asignarActividadesTutorado($tutorado->id, $idGradoEscolar->id);

        $tutorGE = Tutor::find($tutor->id);
        $tutorGE->id_gradoEscolar = $idGradoEscolar->id;
        $tutorGE->update();

        self::asignarActividadesTutor($tutor->id, $idGradoEscolar->id);

        return redirect()->route('tutor.tutorados')
                        ->with(['message' => 'Tutorado agregado']);
    }

    private function asignarActividadesTutor($idTutor, $idGradoE)
    {
        $actividades = ActividadTutor::where('id_gradoEscolar', '=', $idGradoE)->pluck('id');

        $asignacionTutor = AsignacionTutor::where('id_tutor', '=', $idTutor)
                ->whereIn('id_actividadTutor', $actividades)
                ->pluck('id_actividadTutor');

        $actividadesTutor = ActividadTutor::where('id_gradoEscolar', '=', $idGradoE)
                        ->whereNotIn('id', $asignacionTutor)
                        ->orderBy('mes')->get();

        foreach ($actividadesTutor as $actividadTutor)
        {
            $asignacionActividades = new AsignacionTutor();
            $asignacionActividades->id_tutor = $idTutor;
            $asignacionActividades->id_actividadTutor = $actividadTutor->id;
            $asignacionActividades->save();
        }
    }

    private function asignarActividadesTutorado($idTutorado, $idGradoE)
    {
        $actividadesTutorado = ActividadTutorado::where('id_gradoEscolar', '=', $idGradoE)
                        ->orderBy('semana')->get();

        foreach ($actividadesTutorado as $actividadTutorado)
        {
            $asignacionActividades = new AsignacionTutorado();
            $asignacionActividades->id_tutorado = $idTutorado;
            $asignacionActividades->id_actividadTutorado = $actividadTutorado->id;
            $asignacionActividades->save();
        }
    }

    private function generarEmail($nombre)
    {
        $email = $nombre . '@ea.com';
        $buscar = User::where('email', '=', $email)->first();
        $i = 1;
        while ($buscar != null)
        {
            $email = $nombre . $i . '@ea.com';
            $buscar = User::where('email', '=', $email)->first();
            $i++;
        }
        return strtolower($email);
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
        $tutorado = Tutorado::find($id);
        $gradosEscolares = GradoEscolar::orderBy('grado')->get();
        return view('tutor.modify-student', [
            'tutorado' => $tutorado,
            'gradosEscolares' => $gradosEscolares
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idUsuario, $idTutorado)
    {
        $validate = $this->validate($request, [
            'nombre' => ['required', 'string', 'max:255'],
            'apellidoPaterno' => ['required', 'string', 'max:30'],
            'apellidoMaterno' => ['required', 'string', 'max:30'],
            'gradoEscolar' => ['required', 'string', 'max:255'],
        ]);

        $nombre = $request->input('nombre');
        $apellidoPaterno = $request->input('apellidoPaterno');
        $apellidoMaterno = $request->input('apellidoMaterno');
        $gradoEscolar = $request->input('gradoEscolar');

        $usuario = User::find($idUsuario);

        $usuario->nombre = $nombre;
        $usuario->apellidoPaterno = $apellidoPaterno;
        $usuario->apellidoMaterno = $apellidoMaterno;

        $usuario->update();

        $idGradoEscolar = GradoEscolar::where('grado', '=', $gradoEscolar)->first();

        $tutorado = Tutorado::find($idTutorado);
        $tutor = \Auth::user()->tutor;

        if ($tutorado->id_gradoEscolar != $idGradoEscolar->id)
        {
            self::eliminarAsignacionTutor($tutorado->id_gradoEscolar, $tutor->id);
            self::asignarActividadesTutor($tutor->id, $idGradoEscolar->id);

            self::eliminarAsignacionTutorado($tutorado->id_gradoEscolar, $idTutorado);
            self::asignarActividadesTutorado($idTutorado, $idGradoEscolar->id);
        }

        $tutorado->id_gradoEscolar = $idGradoEscolar->id;
        $tutorado->update();

        $tutor->id_gradoEscolar = $idGradoEscolar->id;
        $tutor->update();

        return redirect()->route('tutor.tutorados')
                        ->with(['message' => 'Tutorado actualizado']);
    }

    public function updatePassword(Request $request, $idUsuario)
    {

        $validate = $this->validate($request, [
            'newPassword' => ['required', 'string', 'min:8'],
            'newPasswordConfirm' => ['required', 'same:newPassword'],
        ]);

        $newPassword = $request->input('newPassword');

        $usuario = User::find($idUsuario);

        $usuario->password = Hash::make($newPassword);
        $usuario->update();

        return redirect()->route('tutor.tutorados')
                        ->with(['message' => 'Contraseña del tutorado actualizada']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tutorado = Tutorado::find($id);
        $idUsuario = $tutorado->id_usuario;
        $usuario = User::find($idUsuario);

        $gradoEscolar = $tutorado->id_gradoEscolar;

        $tutor = \Auth::user()->tutor;
        $tutor->id_gradoEscolar = null;

        $tutor->update();

        self::eliminarAsignacionTutor($gradoEscolar, $tutor->id);

        $usuario->delete();
        
        return redirect()->route('tutor.tutorados')
                        ->with(['message' => 'Tutorado eliminado']);
    }

    public function eliminarAsignacionTutor($idGradoEscolar, $idTutor)
    {
        $tutorados = Tutorado::where('id_tutor', '=', $idTutor)
                ->where('id_gradoEscolar', '=', $idGradoEscolar)
                ->get();


        if (count($tutorados) == 1)
        {
            $actividades = ActividadTutor::where('id_gradoEscolar', '=', $idGradoEscolar)->get();
            foreach ($actividades as $actividad)
            {
                $asignacion = AsignacionTutor::where('id_tutor', '=', $idTutor)
                        ->where('id_actividadTutor', '=', $actividad->id)
                        ->delete();
            }
        }
    }

    public function eliminarAsignacionTutorado($idGradoEscolar, $idTutorado)
    {
        $actividades = ActividadTutorado::where('id_gradoEscolar', '=', $idGradoEscolar)->get();
        foreach ($actividades as $actividad)
        {
            $asignacion = AsignacionTutorado::where('id_tutorado', '=', $idTutorado)
                    ->where('id_actividadTutorado', '=', $actividad->id)
                    ->delete();
        }
    }

}
