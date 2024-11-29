@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Busqueda de pacientes</h1>
</div>

<hr>

<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Buscar al paciente</h3>
            </div>
            <div class="card-body">
                <form action="{{route('admin.historial.buscar_pacientes')}}" method="get">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Documento de identidad</label>
                                <input type="text" name="cc" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div style="height: 32px;"></div>
                                <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i>Buscar</button>
                            </div>
                        </div>
                    </div>
                </form>
                <hr>
                @if($paciente)
                <h3>Información del paciente</h3>
                <div class="row">
                    <table>
                        <tr>
                            <td><b>Paciente:</b></td>
                            <td>{{$paciente->apellidos." ".$paciente->nombres}}</td>
                        </tr>
                        <tr>
                            <td><b>Identificacion:</b></td>
                            <td>{{$paciente->cc}}</td>
                        </tr>
                        <tr>
                            <td><b>Fecha de nacimiento:</b></td>
                            <td>{{$paciente->fecha_nacimiento}}</td>
                        </tr>
                        <tr>
                            <td><b>Genero:</b></td>
                            <td>{{$paciente->genero}}</td>
                        </tr>
                    </table>
                </div>
                <a href="{{url('admin/historial/paciente/'.$paciente->id)}}" class="btn btn-warning">Imprimir historial del paciente</a>
                @else
                <p>Paciente no registrado</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection