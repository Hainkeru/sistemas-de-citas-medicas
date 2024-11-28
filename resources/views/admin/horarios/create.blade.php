@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="{{ asset ('/horarios.css')}}">

<body>
    <div class="container-fluid">
        <form action="{{url('/admin/horarios/create')}}" method="POST" class="mx auto">
            @csrf
            <h4 class=text-center>Registrar un horario</h4>
            <br>
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-4">
                        <label for="" class="form-label">Consultorio</label>
                        <select name="consultorio_id" id="consultorio_select" class="form-control">
                            <option value="">Seleccionar consultorio</option>
                            @foreach($consultorios as $consultorio)
                            <option value="{{$consultorio->id}}">{{$consultorio->nombre}} - {{$consultorio->ubicacion}}</option>
                            @endforeach

                        </select>
                        <script>
                            $('#consultorio_select').on('change', function() {
                                var consultorio_id = $('#consultorio_select').val();
                                var url = "{{route('admin.horarios.cargar_datos_consultorios', ':id')}}"
                                url = url.replace(':id', consultorio_id);
                                if (consultorio_id) {
                                    $.ajax({
                                        url: url,
                                        type: 'GET',
                                        success: function(data) {
                                            $('#consultorio_info').html(data);
                                        },
                                        error: function() {
                                            alert('error al obtener el id del consultorio')
                                        }
                                    });
                                } else {
                                    $('#consultorio_info').html('');
                                }
                            });
                        </script>
                    </div>

                    <div class="col-md-4">
                        <label for="" class="form-label">Hora inicio</label>
                        <input type="time" name="hora_inicio" class="form-control" value="{{old('hora_inicio')}}" required>
                        @error('hora_inicio')
                        <small style="color:red">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">Hora final</label>
                        <input type="time" name="hora_fin" class="form-control" value="{{old('hora_fin')}}" required>
                        @error('hora_fin')
                        <small style="color:red">{{$message}}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="" class="form-label">Doctor</label>
                    <select name="doctor_id" id="" class="form-control">
                        @foreach($doctores as $doctor)
                        <option value="{{$doctor->id}}">{{$doctor->nombre}} {{$doctor->apellidos}} - {{$doctor->especialidad}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="col-md-3">
                    <label for="" class="form-label">Día</label>
                    <select name="día" id="" class="form-control">
                        <option value="LUNES">LUNES</option>
                        <option value="MARTES">MARTES</option>
                        <option value="MIERCOLES">MIERCOLES</option>
                        <option value="JUEVES">JUEVES</option>
                        <option value="VIERNES">JUEVES</option>
                        <option value="SABADO">SABADO</option>
                        <option value="DOMINGO">DOMINGO</option>
                    </select>
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
                        <a href="{{url('admin/horarios')}}" class="btn btn-outline-danger">Cancelar</a>
                    </div>
                </div>
            </div>

        </form>
    </div>
    <br>
    <div class="row">
    <div class="col-md-12">
        <div id="consultorio_info">

        </div>
    </div>
    </div>
</body>
@endsection