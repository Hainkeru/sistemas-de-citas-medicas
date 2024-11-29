@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="{{ asset ('/app.css')}}">





<body>
    <div class="container-fluid">
        <form action="{{url('/admin/pagos/'.$pago->id)}}" method="POST" class="mx auto">
            @csrf
            @method('DELETE')
            <h4 class=text-center>¿Estás seguro que deseas eliminar este pago?</h4>
            <div class="mb-3 mt-5">
                <label for="" class="form-label">Monto</label>
                <input type="text" name="name" value="{{$pago->monto}}" class="form-control" aria-describedby="emailHelp" disabled>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Fecha de pago</label>
                <input type="email" name="email" value="{{$pago->fecha_pago}}" class="form-control" disabled>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Descripcion</label>
                <input type="email" name="email" value="{{$pago->descripcion}}" class="form-control" disabled>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Paciente</label>
                <input type="email" name="email" value="{{$pago->paciente->apellidos}} {{$pago->paciente->nombres}}" class="form-control" disabled>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Doctor</label>
                <input type="email" name="email" value="{{$pago->doctor->apellidos}} {{$pago->doctor->nombre}}" class="form-control" disabled>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form group">
                        <button type="submit" class="btn btn-danger" name="enviar">Eliminar pago</button>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="form group">
                        <a href="{{url('admin/pago')}}" class="btn btn-outline-danger">Cancelar</a>
                    </div>
                </div>
            </div>


        </form>
    </div>
</body>
@endsection