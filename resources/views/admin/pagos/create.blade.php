@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="{{ asset ('/paciente.css')}}">

<body>
    <div class="container-fluid">
        <form action="{{url('/admin/pagos/create')}}" method="POST">
            @csrf
            <h4 class=text-center>Registrar un nuevo pago</h4>
            <br>
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-4">
                        <label for="" class="form-label">Paciente</label>
                        <select name="paciente_id" id="" class="form-control">
                            @foreach($pacientes as $paciente)
                            <option value="{{$paciente->id}}">{{$paciente->apellidos." ".$paciente->nombres}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">Doctor</label>
                        <select name="doctor_id" id="" class="form-control">
                            @foreach($doctores as $doctor)
                            <option value="{{$doctor->id}}">{{$doctor->apellidos." ".$doctor->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Fecha de pago</label> <b>*</b>
                            <input type="date" name="fecha_pago" value="<?php echo date('Y-m-d')?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Monto</label> <b>*</b>
                            <input type="text" name="monto" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Descripcion</label> <b>*</b>
                            <input type="text" name="descripcion" class="form-control">
                        </div>
                    </div>
                </div>
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
                        <a href="{{url('admin/pagos')}}" class="btn btn-outline-danger">Cancelar</a>
                    </div>
                </div>
            </div>

        </form>
    </div>
</body>
@endsection