@extends('layouts.admin')
@section('content')
  <link rel="stylesheet" href="{{ asset ('/app.css')}}">





  <body>
  <div class="container-fluid">
    <form action="{{url('/admin/users/create')}}" method="POST" class="mx auto">
      @csrf
      <h4 class=text-center>{{$usuario->name}}</h4>
      <div class="mb-3 mt-5">
        <label for="" class="form-label">Nombre de usuario</label>
        <p>{{$usuario->name}}</p>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Email</label>
        <p>{{$usuario->email}}</p>
      </div>
  <div class="row">
    <div class="col-md-12">
      <div class="form group">
      <a href="{{url('admin/users')}}" class="btn btn-outline-danger">Cancelar</a>
      </div>
    </div>
  </div>

  
    </form>
  </div>
  </body>
@endsection

