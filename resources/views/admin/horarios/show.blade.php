@extends('layouts.admin')
@section('content')
  <link rel="stylesheet" href="{{ asset ('/app.css')}}">





  <body>
  <div class="container-fluid">
    <form action="{{url('/admin/doctores/create')}}" method="POST" class="mx auto">
      @csrf
      <h4 class=text-center>Horario</h4>
      <div class="mb-3">
        <label for="" class="form-label">Nombre del doctor</label>
        <p>{{$horario->doctor->nombre. " ". $horario->doctor->apellidos}}</p>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Día</label>
        <p>{{$horario->día}}</p>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Horario inicio</label>
        <p>{{$horario->hora_inicio}}</p>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Horario fin</label>
        <p>{{$horario->hora_fin}}</p>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Consultorio</label>
        <p>{{$horario->consultorio->ubicacion}}</p>
      </div>
  <div class="row">
    <div class="col-md-12">
      <div class="form group">
      <a href="{{url('admin/horarios')}}" class="btn btn-outline-danger">Cancelar</a>
      </div>
    </div>
  </div>

  
    </form>
  </div>
  </body>
@endsection

