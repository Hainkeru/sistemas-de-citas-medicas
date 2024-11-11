@extends('layouts.admin')
@section('content')
  <link rel="stylesheet" href="{{ asset ('/app.css')}}">





  <body>
  <div class="container-fluid">
    <form action="{{url('/admin/pacientes/create')}}" method="POST" class="mx auto">
      @csrf
      <h4 class=text-center>{{$paciente->nombres}} {{$paciente->apellidos}}</h4>
      <div class="mb-3">
        <label for="" class="form-label">Nombre de usuario</label>
        <p>{{$paciente->nombres}}</p>
      </div>
      <div class="mb-3 ">
        <label for="" class="form-label">Apellido de usuario</label>
        <p>{{$paciente->apellidos}}</p>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Cedula</label>
        <p>{{$paciente->cc}}</p>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Celular</label>
        <p>{{$paciente->celular}}</p>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Direccion</label>
        <p>{{$paciente->direccion}}</p>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Email</label>
        <p>{{$paciente->email}}</p>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Grupo sanguineo</label>
        <p>{{$paciente->grupo_sanguineo}}</p>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Email</label>
        <p>{{$paciente->observaciones}}</p>
      </div>
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

