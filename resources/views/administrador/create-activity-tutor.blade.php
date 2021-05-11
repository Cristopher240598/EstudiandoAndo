@extends('layouts.header-footer-administrator')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header text-center">
            <h6 class="text-primary font-weight-bold m-0" style="font-size: 25px;">Agregar actividad para tutor</h6>
        </div>
        <div class="card-body">
            <div class="row d-flex justify-content-center">
                <div class="col col-create-activity">
                    <div class="p-5-create-activity-tutor">
                        <form class="user" method="POST" action="{{ route('admin.guardar-actividad-tutor') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group d-md-flex align-items-md-center">
                                <div class="col" style="padding: 0px;">
                                    <label style="color: rgb(0,0,0);font-size: 18px;">Grado escolar</label>
                                    <select class="form-control" id="gradoEscolar" name="gradoEscolar" style="font-size: 18px;border-radius: 10rem;color: rgb(0,0,0);max-width: 70%;" required autofocus>
                                        <optgroup label="Grado escolar">
                                            @foreach($gradosEscolares as $gradoEscolar)
                                                <option value="{{ $gradoEscolar->grado }}">{{ $gradoEscolar->grado }}</option>
                                            @endforeach    
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-user @error('mes') is-invalid @enderror" type="number" style="color: rgb(0,0,0);font-size: 18px; max-width: 180px;" placeholder="Número de mes" id="mes" name="mes" min="1" max="6" value="{{ old('mes') }}" required autocomplete="off" autofocus>
                                @error('mes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-user @error('nombre') is-invalid @enderror" type="text" style="color: rgb(0,0,0);font-size: 18px;" placeholder="Nombre de la actividad" id="nombre" name="nombre" value="{{ old('nombre') }}" required autocomplete="off" autofocus>
                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group d-md-flex align-items-md-center">
                                <div class="col col-create-activity-tutor">
                                    <label style="color: rgb(0,0,0);">Imagen (800x533)</label>
                                    <input class="@error('imagen') is-invalid @enderror" type="file" style="max-width: 100%;" accept="image/*" id="imagen" name="imagen" required>
                                    @error('imagen')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col d-flex justify-content-center col-create-activity-tutor">
                                    <img class="img-cat" style="max-width: 100%;" src="" id="imagenSalida">
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control form-control-user @error('objetivo') is-invalid @enderror" placeholder="Objetivo" id="objetivo" name="objetivo" style="font-size: 18px;color: rgb(0,0,0);" required autocomplete="off" autofocus>{{ old('objetivo') }}</textarea>
                                @error('objetivo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea class="form-control form-control-user @error('instrucciones') is-invalid @enderror" placeholder="Instrucciones" id="instrucciones" name="instrucciones" style="font-size: 18px;color: rgb(0,0,0);" required autocomplete="off" autofocus>{{ old('instrucciones') }}</textarea>
                                @error('instrucciones')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-user @error('especialista') is-invalid @enderror" type="text" style="color: rgb(0,0,0);font-size: 18px;" placeholder="Especialista" id="especialista" name="especialista" value="{{ old('especialista') }}" required autocomplete="off" autofocus>
                                @error('especialista')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label style="color: rgb(0,0,0);margin-right: 5px;">Archivo (Opcional) máximo 256M</label>
                                <input class="@error('archivo') is-invalid @enderror" type="file" id="archivo" name="archivo" style="max-width: 100%;">
                                @error('archivo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-user @error('enlace') is-invalid @enderror" type="text" id="enlace" name="enlace" style="color: rgb(0,0,0);font-size: 18px;" placeholder="Link (Opcional)" value="{{ old('enlace') }}" autocomplete="off" autofocus>
                                @error('enlace')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-user @error('pregunta') is-invalid @enderror" type="text" id="pregunta" name="pregunta" style="color: rgb(0,0,0);font-size: 18px;" placeholder="Pregunta abierta" value="{{ old('pregunta') }}" required autocomplete="off" autofocus>
                                @error('pregunta')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <button class="btn btn-secondary" id="botonAgregarPregunta" name="botonAgregarPregunta" style="margin-top: 10px;" type="button">Agregar otra pregunta</button>
                                <button class="btn btn-warning btn_remove" type="button" name="remove" id="botonBorrar" style="margin-top: 10px;">Borrar preguntas</button>
                            </div>
                            <div id="dynamic_field">
<!--                        <div class="form-group d-sm-flex align-items-sm-center">        
                                <input class="form-control form-control-user @error('pregunta') is-invalid @enderror" type="text" id="pregunta" name="pregunta" style="color: rgb(0,0,0);font-size: 18px;" placeholder="Pregunta abierta" value="{{ old('pregunta') }}" required autocomplete="off" autofocus>
                                @error('pregunta')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <button class="btn btn-warning" type="button">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </div>    -->
                            </div>
                            <button class="btn btn-primary btn-block text-white btn-user" type="submit" role="button" style="font-size: 18px;">Agregar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection