@extends('layouts.header-footer-administrator')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header text-center">
            <h6 class="text-primary font-weight-bold m-0" style="font-size: 25px;">Agregar grado escolar</h6>
        </div>
        <div class="card-body">
            <div class="row d-flex justify-content-center">
                <div class="col col-create-activity">
                    <div class="p-5-create-activity-tutor">
                        <form class="user" method="POST" action="{{ route('admin.actualizar-grado', ['id' => $gradoEscolar->id]) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input class="form-control form-control-user @error('grado') is-invalid @enderror" type="text" style="color: rgb(0,0,0);font-size: 18px;" id="grado" name="grado" placeholder="Grado escolar" value="{{ $gradoEscolar->grado }}" required autocomplete="off" autofocus>
                                @error('grado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button class="btn btn-primary btn-block text-white btn-user" type="submit" role="button" style="font-size: 18px;">Guardar cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection