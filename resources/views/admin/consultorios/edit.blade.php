@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="{{ asset ('/paciente.css')}}">

<body>
    <div class="container-fluid">
        <form action="{{url('/admin/consultorios/'.$consultorio->id)}}" method="POST" class="mx auto">
            @csrf
            @method('PUT')
            <h4 class=text-center>Modificar consultorio: {{$consultorio->nombre}}</h4>
            <br>
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-4">
                        <label for="" class="form-label">Nombre</label>
                        <input type="text" name="nombre" value="{{$consultorio->nombre}}" class="form-control" aria-describedby="emailHelp" required>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">Ubicacion</label>
                        <input type="text" name="ubicacion" value="{{$consultorio->ubicacion}}" class="form-control" required>
                        @error('ubicacion')
                        <small style="color:red">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">Capacidad</label>
                        <input type="number" name="capacidad" class="form-control" value="{{$consultorio->capacidad}}" required>
                        @error('capacidad')
                        <small style="color:red">{{$message}}</small>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label for="" class="form-label">Telefono</label>
                    <input type="text" name="telefono" value="{{$consultorio->telefono}}" class="form-control">
                </div>
                <div class="col-md-5">
                    <label for="" class="form-label">Especialidad</label>
                    <input type="text" name="especialidad" class="form-control" value="{{$consultorio->especialidad}}" required>
                    @error('especialidad')
                    <small style="color:red">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="" class="form-label">Estado</label>
                    <select name="estado" id="" class="form-control">
                        @if($consultorio->estado=='ACTIVO')
                        <option value="ACTIVO">ACTIVO</option>
                        <option value="INACTIVO">INACTIVO</option>
                        @else
                        <option value="INACTIVO">INACTIVO</option>
                        <option value="ACTIVO">ACTIVO</option>
                        @endif
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="form group">
                        <button type="submit" class="btn btn-primary" name="enviar">Actualizar</button>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="form group">
                        <a href="{{url('admin/consultorios')}}" class="btn btn-outline-danger">Cancelar</a>
                    </div>
                </div>
            </div>

        </form>
    </div>
</body>
@endsection