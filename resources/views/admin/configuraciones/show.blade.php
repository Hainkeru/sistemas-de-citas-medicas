@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="{{ asset ('/app.css')}}">





<body>
    <div class="container-fluid">
        <form action="{{url('/admin/configuraciones/create')}}" method="POST" class="mx auto">
            @csrf
            <h4 class=text-center>{{$configuracion->nombre}}</h4>
            <div class="mb-3 ">
                <label for="" class="form-label">Direccion</label>
                <p>{{$configuracion->direccion}}</p>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Telefono</label>
                <p>{{$configuracion->telefono}}</p>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Correo</label>
                <p>{{$configuracion->correo}}</p>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Logo</label>
                <br>
                <img src="{{url('/storage/'.$configuracion->logo)}}" alt="logo" width="100px">
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form group">
                        <a href="{{url('admin/configuraciones')}}" class="btn btn-outline-danger">Cancelar</a>
                    </div>
                </div>
            </div>


        </form>
    </div>
    </div>

</body>
@endsection