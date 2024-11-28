@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="{{ asset ('/app.css')}}">





<body>
    <div class="container-fluid">
        <form action="{{url('/admin/configuraciones/'.$configuracion->id)}}" method="POST" class="mx auto">
            @csrf
            @method('DELETE')
            <h4 class=text-center>¿Estás seguro que deseas eliminar esta configuracion?</h4>
            <div class="mb-3 mt-5">
                <label for="" class="form-label">Nombre</label>
                <input type="text" name="name" value="{{$configuracion->nombre}}" class="form-control" aria-describedby="emailHelp" disabled>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Direccion</label>
                <input type="email" name="email" value="{{$configuracion->direccion}}" class="form-control" disabled>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Telefono</label>
                <input type="email" name="email" value="{{$configuracion->telefono}}" class="form-control" disabled>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Correo</label>
                <input type="email" name="email" value="{{$configuracion->correo}}" class="form-control" disabled>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Logo</label>
                <br>
                <img src="{{url('/storage/'.$configuracion->logo)}}" alt="logo" width="100px">
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
                        <a href="{{url('admin/configuraciones')}}" class="btn btn-outline-danger">Cancelar</a>
                    </div>
                </div>
            </div>


        </form>
    </div>
</body>
@endsection