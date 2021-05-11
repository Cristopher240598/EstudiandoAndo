<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tutor;
use App\AsignacionTutor;
use App\ActividadTutor;
use Illuminate\Support\Facades\Hash;

class TutorController extends Controller
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

    public function indexAdministrador()
    {
        return view('administrador.index');
    }

    public function indexTutorAdministrador()
    {

        return view('administrador.activate-tutor');
    }

    public function tutorPendiente($buscar = null)
    {
        $tutores = Tutor::pluck('id_usuario');
        if (!empty($buscar))
        {
            $this->_buscarPalabra = $buscar;
            $usuarios = User::where('rol', '=', 'usuario')
                            ->whereNotIn('id', $tutores)
                            ->where(function($query)
                            {
                                $buscar = $this->_buscarPalabra;
                                $query->where('nombre', 'LIKE', '%' . $buscar . '%')
                                ->orWhere('email', 'LIKE', '%' . $buscar . '%');
                            })
                            ->orderBy('nombre')->paginate(10);
        } else
        {
            $usuarios = User::where('rol', '=', 'usuario')
                            ->whereNotIn('id', $tutores)
                            ->orderBy('nombre')->paginate(10);
        }

        return view('administrador.tutor-pending', [
            'usuarios' => $usuarios
        ]);
    }

    public function agregarQuitarTutor($idUsuario, $estatus)
    {
        $tutor = new Tutor();
        $tutor->id_usuario = $idUsuario;

        $usuario = User::find($idUsuario);
        $usuario->rol = 'tutor';
        $usuario->update();

        if ($estatus == 1)
        {
            $tutor->estatus = 1;
            $tutor->save();
            
            $mensaje = 'Tutor activado';
        } else
        {
            $tutor->estatus = 0;
            $mensaje = 'Tutor eliminado';

            $tutor->save();
        }

        return redirect()->route('admin.tutor-pendiente')
                        ->with(['message' => $mensaje]);
    }

    public function tutorActivo($buscar = null)
    {
        $tutores = Tutor::where('estatus', '=', 1)->pluck('id_usuario');
        if (!empty($buscar))
        {
            $this->_buscarPalabra = $buscar;
            $usuarios = User::where('users.rol', '=', 'tutor')
                            ->whereIn('id', $tutores)
                            ->where(function($query)
                            {
                                $buscar = $this->_buscarPalabra;
                                $query->where('nombre', 'LIKE', '%' . $buscar . '%')
                                ->orWhere('email', 'LIKE', '%' . $buscar . '%');
                            })
                            ->orderBy('nombre')->paginate(10);
        } else
        {
            $usuarios = User::where('users.rol', '=', 'tutor')
                            ->whereIn('id', $tutores)
                            ->orderBy('nombre')->paginate(10);
        }

        return view('administrador.tutor-active', [
            'tutores' => $usuarios
        ]);
    }

    public function tutorEliminado($buscar = null)
    {
        $tutores = Tutor::where('estatus', '=', 0)->pluck('id_usuario');
        if (!empty($buscar))
        {
            $this->_buscarPalabra = $buscar;
            $usuarios = User::where('users.rol', '=', 'tutor')
                            ->whereIn('id', $tutores)
                            ->where(function($query)
                            {
                                $buscar = $this->_buscarPalabra;
                                $query->where('nombre', 'LIKE', '%' . $buscar . '%')
                                ->orWhere('email', 'LIKE', '%' . $buscar . '%');
                            })
                            ->orderBy('nombre')->paginate(10);
        } else
        {
            $usuarios = User::where('users.rol', '=', 'tutor')
                            ->whereIn('id', $tutores)
                            ->orderBy('nombre')->paginate(10);
        }

        return view('administrador.tutor-removed', [
            'tutores' => $usuarios
        ]);
    }

    public function activarTutor($idUsuario)
    {
        $tutor = Tutor::where('id_usuario', '=', $idUsuario)->first();
        $tutor->estatus = 1;

        $tutor->update();

        return redirect()->route('admin.tutor-eliminado')
                        ->with(['message' => 'Tutor activado']);
    }

    public function desactivarTutor($idUsuario)
    {
        $tutor = Tutor::where('id_usuario', '=', $idUsuario)->first();
        $tutor->estatus = 0;

        $tutor->update();

        return redirect()->route('admin.tutor-activo')
                        ->with(['message' => 'Tutor desactivado']);
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
    public function edit()
    {
        return view('tutor.profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $tutor = \Auth::user();
        $id = $tutor->id;

        $validate = $this->validate($request, [
            'nombre' => ['required', 'string', 'max:255'],
            'apellidoPaterno' => ['required', 'string', 'max:30'],
            'apellidoMaterno' => ['required', 'string', 'max:30'],
            'correoElectronico' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
//            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $nombre = $request->input('nombre');
        $apellidoPaterno = $request->input('apellidoPaterno');
        $apellidoMaterno = $request->input('apellidoMaterno');
        $correoElectronico = $request->input('correoElectronico');

        $tutor->nombre = $nombre;
        $tutor->apellidoPaterno = $apellidoPaterno;
        $tutor->apellidoMaterno = $apellidoMaterno;
        $tutor->email = $correoElectronico;

        $tutor->update();

        return redirect()->route('tutor.actividades')
                        ->with(['message' => 'Perfil actualizado']);
    }

    public function updatePassword(Request $request)
    {
        $usuario = \Auth::user();

        $validate = $this->validate($request, [
            'password' => ['required'],
            'newPassword' => ['required', 'string', 'min:8'],
            'newPasswordConfirm' => ['required', 'same:newPassword'],
        ]);

        $password = $request->input('password');
        $newPassword = $request->input('newPassword');

        if (Hash::check($password, $usuario->password))
        {
            $usuario->password = Hash::make($newPassword);
            $usuario->save();
        }

        return redirect()->route('tutor.actividades')
                        ->with(['message' => 'Contraseña actualizada']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::find($id);

        $usuario->delete();

        return redirect()->route('admin.tutor-eliminado')
                        ->with(['message' => 'Tutor eliminado']);
    }

    public function perfil()
    {
        return view('tutor.profile');
    }

}
