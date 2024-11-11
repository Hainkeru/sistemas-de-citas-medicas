@extends('layouts.admin')
@section('content')
  <link rel="stylesheet" href="{{ asset ('/app.css')}}">





  <body>
  <div class="container-fluid">
    <form action="{{url('/admin/users/create')}}" method="POST" class="mx auto">
      @csrf
      <h4 class=text-center>{{$secretaria->nombres}} {{$secretaria->apellidos}}</h4>
      <div class="mb-3">
        <label for="" class="form-label">Nombre de usuario</label>
        <p>{{$secretaria->nombres}}</p>
      </div>
      <div class="mb-3 ">
        <label for="" class="form-label">Apellido de usuario</label>
        <p>{{$secretaria->nombres}}</p>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Cedula</label>
        <p>{{$secretaria->cc}}</p>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Celular</label>
        <p>{{$secretaria->celular}}</p>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Direccion</label>
        <p>{{$secretaria->direccion}}</p>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Email</label>
        <p>{{$secretaria->user->email}}</p>
      </div>
  <div class="row">
    <div class="col-md-12">
      <div class="form group">
      <a href="{{url('admin/secretarias')}}" class="btn btn-outline-danger">Cancelar</a>
      </div>
    </div>
  </div>

  
    </form>
  </div>
  </body>
@endsection

