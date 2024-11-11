@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="{{ asset ('/paciente.css')}}">

<body>
    <div class="container-fluid">
        <form action="{{url('/admin/doctores/'.$doctor->id)}}" method="POST" class="mx auto">
            @csrf
            @method('PUT')
            <h4 class=text-center>Editar al doctor/a</h4>
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-4">
                        <label for="" class="form-label">Nombre</label>
                        <input type="text" name="nombre" value="{{$doctor->nombre}}" class="form-control" aria-describedby="emailHelp" required>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">apellidos</label>
                        <input type="text" name="apellidos" value="{{$doctor->apellidos}}" class="form-control" required>
                        @error('ubicacion')
                        <small style="color:red">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">telefono</label>
                        <input type="number" name="telefono" class="form-control" value="{{$doctor->telefono}}" required>
                        @error('telefono')
                        <small style="color:red">{{$message}}</small>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label for="" class="form-label">licencia_medica</label>
                    <input type="text" name="licencia_medica" value="{{$doctor->licencia_medica}}" class="form-control">
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">Especialidad</label>
                    <input type="text" name="especialidad" class="form-control" value="{{$doctor->especialidad}}" required>
                    @error('especialidad')
                    <small style="color:red">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">Email</label>
                    <input type="email" name="email" value="{{$doctor->user->email}}" class="form-control" required>
                    @error('email')
                    <small style="color:red">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <label for="" class="form-label">Contraseña</label>
                    <input type="password" name="password" class="form-control">
                    @error('password')
                    <small style="color:red">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">Confirmar contraseña</label>
                    <input type="password" name="password_confirmation" class="form-control" >
                    @error('password_confirmation')
                    <small style="color:red">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="form group">
                        <button type="submit" class="btn btn-primary" name="enviar">Registrar</button>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="form group">
                        <a href="{{url('admin/doctores')}}" class="btn btn-outline-danger">Cancelar</a>
                    </div>
                </div>
            </div>

        </form>
    </div>
</body>
@endsection