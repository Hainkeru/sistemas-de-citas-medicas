@extends('layouts.admin')
@section('content')
  <link rel="stylesheet" href="{{ asset ('/app.css')}}">





  <body>
  <div class="container-fluid">
    <form action="{{url('/admin/horarios/'.$horario->id)}}" method="POST" class="mx auto">
      @csrf
      @method('DELETE')
      <h4 class=text-center>¿Estás seguro que deseas eliminar este horario?</h4>
      <div class="mb-3 mt-5">
        <label for="" class="form-label">Día</label>
        <input type="text" name="día" value="{{$horario->día}}" class="form-control" aria-describedby="emailHelp" disabled>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Hora inicio</label>
        <input type="email" name="hora_inicio" value="{{$horario->hora_inicio}}" class="form-control" disabled>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Hora fin</label>
        <input type="email" name="hora_fin" value="{{$horario->hora_fin}}" class="form-control" disabled>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Doctor</label>
        <input type="email" name="doctor" value="{{$horario->doctor->nombre}} {{$horario->doctor->apellidos}}" class="form-control" disabled>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Consultorio</label>
        <input type="email" name="consultorio" value="{{$horario->consultorio->nombre}} {{$horario->consultorio->ubicacion}}" class="form-control" disabled>
      </div>
      <br>
  <div class="row">
    <div class="col-md-12">
      <div class="form group">
        <button type="submit" class="btn btn-danger" name="enviar">Eliminar horario</button>
      </div>
    </div>
  </div>
  <br>
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

