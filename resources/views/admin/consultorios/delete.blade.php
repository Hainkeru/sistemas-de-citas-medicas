@extends('layouts.admin')
@section('content')
  <link rel="stylesheet" href="{{ asset ('/app.css')}}">





  <body>
  <div class="container-fluid">
    <form action="{{url('/admin/consultorios/'.$consultorio->id)}}" method="POST" class="mx auto">
      @csrf
      @method('DELETE')
      <h4 class=text-center>¿Estás seguro que deseas eliminar este consultorio?</h4>
      <div class="mb-3 mt-5">
        <label for="" class="form-label">Nombre de consultorio</label>
        <input type="text" name="name" value="{{$consultorio->nombre}}" class="form-control" aria-describedby="emailHelp" disabled>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Ubicacion</label>
        <input type="email" name="email" value="{{$consultorio->ubicacion}}" class="form-control" disabled>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Capacidad</label>
        <input type="email" name="email" value="{{$consultorio->capacidad}}" class="form-control" disabled>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Estado</label>
        <input type="email" name="email" value="{{$consultorio->estado}}" class="form-control" disabled>
      </div>
      <br>
  <div class="row">
    <div class="col-md-12">
      <div class="form group">
        <button type="submit" class="btn btn-danger" name="enviar">Eliminar consultorio</button>
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

