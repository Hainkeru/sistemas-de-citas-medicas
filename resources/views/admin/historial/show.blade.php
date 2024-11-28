@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="{{ asset ('/app.css')}}">





<body>
    <div class="container-fluid">
        <form action="{{url('/admin/historial/create')}}" method="POST" class="mx auto">
            @csrf
            <h4 class=text-center>{{$historial->paciente->apellidos." ".$historial->paciente->nombres}}</h4>
            <br>
            <div class="mb-3 ">
                <label for="" class="form-label">Fecha de cita medica</label>
                <p>{{$historial->fecha_visita}}</p>
            </div>
            <br>
            <div class="mb-3">
                <label for="" class="form-label">Detalle</label>
                <p>{{$historial->details}}</p>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form group">
                        <a href="{{url('admin/historial')}}" class="btn btn-outline-danger">Cancelar</a>
                    </div>
                </div>
            </div>


        </form>
    </div>
    </div>

</body>
@endsection