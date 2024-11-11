@extends('layouts.admin')
@section('content')
  <link rel="stylesheet" href="{{ asset ('/app.css')}}">





  <body>
  <div class="container-fluid">
    <form action="{{url('/admin/users/create')}}" method="POST" class="mx auto">
      @csrf
      <h4 class=text-center>Registrar usuario</h4>
      <div class="mb-3 mt-5">
        <label for="" class="form-label">Nombre de usuario</label>
        <input type="text" name="name" value="{{old('name')}}" class="form-control" aria-describedby="emailHelp" required>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Email</label>
        <input type="email" name="email" value="{{old('email')}}" class="form-control" required>
        @error('email')
        <small style="color:red">{{$message}}</small>
        @enderror
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Contraseña</label>
        <input type="password" name="password" value="{{old('password')}}" class="form-control" required>
        @error('password')
        <small style="color:red">{{$message}}</small>
        @enderror
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Confirmar contraseña</label>
        <input type="password" name="password_confirmation" class="form-control" required>
        @error('password_confirmation')
        <small style="color:red">{{$message}}</small>
        @enderror
      </div>
      <br>
  <div class="row">
    <div class="col-md-12">
      <div class="form group">
        <button type="submit" class="btn btn-primary" name="enviar">Registrar</button>
      </div>
    </div>
  </div>
  <br>
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

