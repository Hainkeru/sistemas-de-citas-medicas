@extends('layouts.admin')
@section('content')
  <link rel="stylesheet" href="{{ asset ('/app.css')}}">





  <body>
  <div class="container-fluid">
    <form action="{{url('/admin/pacientes/'.$paciente->id)}}" method="POST" class="mx auto">
      @csrf
      @method('DELETE')
      <h4 class=text-center>¿Estás seguro que deseas eliminar este paciente?</h4>
      <div class="mb-3 mt-5">
        <label for="" class="form-label">Nombre de usuario</label>
        <input type="text" name="name" value="{{$paciente->nombres}} {{$paciente->apellidos}}" class="form-control" aria-describedby="emailHelp" disabled>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Cedula</label>
        <input type="email" name="email" value="{{$paciente->cc}}" class="form-control" disabled>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Email</label>
        <input type="email" name="email" value="{{$paciente->email}}" class="form-control" disabled>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Direccion</label>
        <input type="email" name="email" value="{{$paciente->direccion}}" class="form-control" disabled>
      </div>
      <br>
  <div class="row">
    <div class="col-md-12">
      <div class="form group">
        <button type="submit" class="btn btn-danger" name="enviar">Eliminar usuario</button>
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

