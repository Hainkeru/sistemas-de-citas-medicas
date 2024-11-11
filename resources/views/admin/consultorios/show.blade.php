@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="{{ asset ('/app.css')}}">





<body>
    <div class="container-fluid">
        <form action="{{url('/admin/consultorio/create')}}" method="POST" class="mx auto">
            @csrf
            <h4 class=text-center>{{$consultorio->nombre}}</h4>
            <div class="mb-3 ">
                <label for="" class="form-label">Ubicacion</label>
                <p>{{$consultorio->ubicacion}}</p>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Capacidad</label>
                <p>{{$consultorio->capacidad}}</p>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Telefono</label>
                <p>{{$consultorio->telefono}}</p>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Estado</label>
                <p>{{$consultorio->estado}}</p>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form group">
                        <a href="{{url('admin/consultorios')}}" class="btn btn-outline-danger">Cancelar</a>
                    </div>
                </div>
            </div>


        </form>
    </div>
    </div>

</body>
@endsection