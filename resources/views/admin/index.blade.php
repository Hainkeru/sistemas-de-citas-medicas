@extends('layouts.admin')
@section('content')
<div class="row">
  <h1>Panel Principal</h1>
</div>

<hr>
<div class="row">
  <div class="col-lg-3 col-6">

    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{$totalUsuarios}}</h3>
        <p>Usuarios</p>
      </div>
      <div class="icon">
        <i class="ion fas bi bi-person-fill"></i>
      </div>
      <a href="{{url('admin/users')}}" class="small-box-footer">Mas información <i class="fas bi bi-person-fill"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-6">

    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{$totalSecretarias}}</h3>
        <p>Secretarias</p>
      </div>
      <div class="icon">
        <i class="ion fas bi bi-person-fill"></i>
      </div>
      <a href="{{url('admin/secretarias')}}" class="small-box-footer">Mas información <i class="fas bi bi-person-fill"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-6">

    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{$totalPacientes}}</h3>
        <p>Pacientes</p>
      </div>
      <div class="icon">
        <i class="ion fas bi bi-person-fill"></i>
      </div>
      <a href="{{url('admin/pacientes')}}" class="small-box-footer">Mas información <i class="fas bi bi-person-fill"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-6">

    <div class="small-box bg-danger">
      <div class="inner">
        <h3>{{$totalConsultorios}}</h3>
        <p>Consultorios</p>
      </div>
      <div class="icon">
        <i class="ion fas bi bi-hospital"></i>
      </div>
      <a href="{{url('admin/consultorios')}}" class="small-box-footer">Mas información <i class="fas bi bi-person-fill"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-6">

    <div class="small-box bg-warning">
      <div class="inner">
        <h3>{{$totalDoctores}}</h3>
        <p>Doctores</p>
      </div>
      <div class="icon">
        <i class="ion fas bi bi-clipboard2-pulse"></i>
      </div>
      <a href="{{url('admin/doctores')}}" class="small-box-footer">Mas información <i class="fas bi bi-person-fill"></i></a>
    </div>
  </div>
</div>

@endsection