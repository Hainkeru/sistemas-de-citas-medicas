@extends('layouts.admin')
@section('content')
  <link rel="stylesheet" href="{{ asset ('/app.css')}}">





  <body>
  <div class="container-fluid">
    <form action="{{url('/admin/doctores/create')}}" method="POST" class="mx auto">
      @csrf
      <h4 class=text-center>{{$doctor->nombre}} {{$doctor->apellidos}}</h4>
      <div class="mb-3">
        <label for="" class="form-label">Nombre del doctor</label>
        <p>{{$doctor->nombre}}</p>
      </div>
      <div class="mb-3 ">
        <label for="" class="form-label">Apellido del doctor</label>
        <p>{{$doctor->apellidos}}</p>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">telefono</label>
        <p>{{$doctor->telefono}}</p>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Licencia medica</label>
        <p>{{$doctor->licencia_medica}}</p>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">especidalidad</label>
        <p>{{$doctor->especialidad}}</p>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Email</label>
        <p>{{$doctor->user->email}}</p>
      </div>
  <div class="row">
    <div class="col-md-12">
      <div class="form group">
      <a href="{{url('admin/doctores')}}" class="btn btn-outline-danger">Cancelar</a>
      </div>
    </div>
  </div>

  
    </form>
  </div>
  </body>
@endsection

