@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="{{ asset ('/paciente.css')}}">

<body>
    <div class="container-fluid">
        <form action="{{url('/admin/pacientes/create')}}" method="POST" class="mx auto">
            @csrf
            <h4 class=text-center>Registrar paciente/o</h4>
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-4">
                        <label for="" class="form-label">Nombres</label>
                        <input type="text" name="nombres" value="{{old('nombres')}}" class="form-control" aria-describedby="emailHelp" required>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">Apellidos</label>
                        <input type="text" name="apellidos" value="{{old('apellidos')}}" class="form-control" required>
                        @error('apellidos')
                        <small style="color:red">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">CC</label>
                        <input type="text" name="cc" class="form-control" value="{{old('cc')}}" required>
                        @error('cc')
                        <small style="color:red">{{$message}}</small>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label for="" class="form-label">Fecha de nacimiento</label>
                    <input type="date" name="fecha_nacimiento" value="{{old('fecha_nacimiento')}}" class="form-control" required>
                    @error('fecha_nacimiento')
                    <small style="color:red">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">Genero</label>
                    <select name="genero" id="" class="form-control">
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">Celular</label>
                    <input type="number" name="celular" class="form-control" value="{{old('celular')}}" required>
                    @error('celular')
                    <small style="color:red">{{$message}}</small>
                    @enderror
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-md-7">
                    <label for="" class="form-label">Direccion</label>
                    <input type="text" name="direccion" class="form-control" value="{{old('direccion')}}" required>
                    @error('direccion')
                    <small style="color:red">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-md-5">
                    <label for="" class="form-label">Email</label>
                    <input type="email" name="email" value="{{old('email')}}" class="form-control" required>
                    @error('email')
                    <small style="color:red">{{$message}}</small>
                    @enderror
                </div>
                
            </div>
            <br>
            <div class="row">
                <div class="col-md-7">
                    <label for="" class="form-label">Alergias</label>
                    <input type="text" name="alergias" class="form-control" required>
                    @error('alergias')
                    <small style="color:red">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-md-2">
                    <label for="" class="form-label">Grupo Sanguineo</label>
                    <select name="grupo_sanguineo" id="" class="form-control">
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="" class="form-label">Contacto de emergencia</label>
                    <input type="number" name="contacto_emergencia" class="form-control" required>
                    @error('contacto_emergencia')
                    <small style="color:red">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <br>
            <div class="mb-3">
                <label for="" class="form-label">observaciones</label>
                <input type="text" name="observaciones" class="form-control" required>
                @error('observaciones')
                <small style="color:red">{{$message}}</small>
                @enderror
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
                        <a href="{{url('admin/pacientes')}}" class="btn btn-outline-danger">Cancelar</a>
                    </div>
                </div>
            </div>

        </form>
    </div>
</body>
@endsection