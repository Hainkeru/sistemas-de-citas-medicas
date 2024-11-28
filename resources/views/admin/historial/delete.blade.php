@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="{{ asset ('/app.css')}}">





<body>
    <div class="container-fluid">
        <form action="{{url('/admin/historial/'.$historial->id)}}" method="POST" class="mx auto">
            @csrf
            @method('DELETE')
            <h4 class=text-center>¿Estás seguro que deseas eliminar este historial?</h4>
            <div class="mb-3 mt-5">
                <label for="" class="form-label">Nombre</label>
                <input type="text" name="name" value="{{$historial->paciente->apellidos}} {{$historial->paciente->nombres}}" class="form-control" disabled>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Direccion</label>
                <input type="text" name="email" value="{{$historial->fecha_visita}}" class="form-control" disabled>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Telefono</label>
                <p>{{$historial->details}}</p>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form group">
                        <button type="submit" class="btn btn-danger" name="enviar">Eliminar configuracion</button>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="form group">
                        <a href="{{url('admin/historial')}}" class="btn btn-outline-danger">Cancelar</a>
                    </div>
                </div>
            </div>


        </form>
    </div>
</body>
@endsection