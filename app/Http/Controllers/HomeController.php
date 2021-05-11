<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usuario = \Auth::user();
        $rol = $usuario->rol;
        if ($rol == 'administrador')
        {
            return view('administrador.index');
        } else if ($rol == 'tutor')
        {
            $estatusTutor = $usuario->tutor->estatus;
            if ($estatusTutor == 1)
            {
                return redirect()->route('tutor.actividades');
            } else
            {
                Auth::logout();
                return redirect()->route('login')
                                ->with(['message' => 'Tutor inactivo']);
            }
        } else if ($rol == 'tutorado')
        {
            return redirect()->route('tutorado.actividades');
        } else
        {
            Auth::logout();
            return redirect()->route('register')
                            ->with(['message' => 'Gracias por registrarse, su cuenta se activará en los próximos días']);
        }
    }

}
