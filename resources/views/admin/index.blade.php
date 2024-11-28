@extends('layouts.admin')
@section('content')
<div class="row">
  <h1><b>Bienvenido: </b> {{Auth::user()->name}} - <b>Rol:</b> {{Auth::user()->roles->pluck('name')->first()}}</h1>
</div>

<hr>
<div class="row">

  @can('admin.users.index')
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
  @endcan



  @can('admin.secretarias.index')
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

  @endcan


  @can('admin.pacientes.index')
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

  @endcan

  @can('admin.consultorios.index')
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
  @endcan

  @can('admin.doctores.index')
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
  @endcan

  @can('admin.horarios.index')
  <div class="col-lg-3 col-6">

    <div class="small-box bg-secondary">
      <div class="inner">
        <h3>{{$totalHorarios}}</h3>
        <p>Horarios</p>
      </div>
      <div class="icon">
        <i class="ion fas bi bi-calendar-check"></i>
      </div>
      <a href="{{url('admin/horarios')}}" class="small-box-footer">Mas información <i class="fas bi bi-person-fill"></i></a>
    </div>
  </div>
  @endcan

  @can('admin.horarios.index')
  <div class="col-lg-3 col-6">

    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{$totalEventos}}</h3>
        <p>Reservas</p>
      </div>
      <div class="icon">
        <i class="ion fas bi bi-calendar-check"></i>
      </div>
      <a href="" class="small-box-footer"><i class="fas bi bi-person-fill"></i></a>
    </div>
  </div>
  @endcan

  @can('admin.users.index')
  <div class="col-lg-3 col-6">

    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{$totalConfiguraciones}}</h3>
        <p>Configuraciones</p>
      </div>
      <div class="icon">
        <i class="ion fas bi bi-gear-fill"></i>
      </div>
      <a href="{{url('admin/configuraciones')}}" class="small-box-footer">Mas información <i class="fas bi bi-person-fill"></i></a>
    </div>
  </div>
  @endcan
</div>





@can('cargar_datos_consultorios')
<div class="row">
  <div class="col-md-12">
    <div class="card card-outline card-primary">
      <div class="card-header">
        <h3 class="card-title">Calendario de atencion doctores</h3>
        <br>
        <div class="col-md-3">
          <label for="" class="form-label">Consultorio:</label>
          <select name="consultorio_id" id="consultorio_select" class="form-control">
            <option value="">Seleccione un consultorio...</option>
            @foreach($consultorios as $consultorio)
            <option value="{{$consultorio->id}}">{{$consultorio->nombre}} - {{$consultorio->ubicacion}}</option>
            @endforeach

          </select>
        </div>
      </div>
      <div class="card-body">
        <script>
          $('#consultorio_select').on('change', function() {
            var consultorio_id = $('#consultorio_select').val();
            //var url = "{{route('admin.horarios.cargar_datos_consultorios', ':id')}}"
            //url = url.replace(':id', consultorio_id);
            if (consultorio_id) {
              $.ajax({
                url: "{{url('/consultorios')}}" + "/" + consultorio_id,
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
        <div id="consultorio_info">

        </div>

      </div>
    </div>
  </div>
</div>



<div class="row">
  <div class="col-md-12">
    <div class="card card-outline card-warning">
      <div class="card-header">
        <h3 class="card-title">Calendario de reserva de citas medicas</h3>
        <br>
        <div class="col-md-3">
          <label for="" class="form-label">Doctores:</label>
          <select name="doctor_id" id="doctor_select" class="form-control">
            <option value="">Seleccione un doctor...</option>
            @foreach($doctores as $doctor)
            <option value="{{$doctor->id}}">{{$doctor->nombre}} {{$doctor->apellidos}} - {{$doctor->especialidad}}</option>
            @endforeach

          </select>
          <script>
            $('#doctor_select').on('change', function() {
              var doctor_id = $('#doctor_select').val();

              var calendarEl = document.getElementById('calendar');
              var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'es',
                events: [

                ],
              });


              if (doctor_id) {
                $.ajax({
                  url: "{{url('/cargar_reserva_doctores')}}" + "/" + doctor_id,
                  type: 'GET',
                  dataType: 'json',
                  success: function(data) {
                    calendar.addEventSource(data);
                  },
                  error: function() {
                    alert('error al obtener el id del consultorio')
                  }
                });
              } else {
                $('#doctor_info').html('');
              }
              calendar.render();
            });
          </script>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <!-- Button trigger modal -->
          <div class="row">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Registrar cita medica
            </button>
            <br>
            <a href="{{url('/admin/ver_reservas/'.Auth::user()->id)}}" class="btn btn-success">Ver reservas</a>
          </div>

          <!-- Modal -->
          <form action="{{url('/admin/eventos/create')}}" method="post">
            @csrf
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Reserva de cita medica</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="">Doctor</label>
                          <select name="doctor_id" id="" class="form-control">
                            @foreach($doctores as $doctor)
                            <option value="{{$doctor->id}}">{{$doctor->nombre}} {{$doctor->apellidos}} - {{$doctor->especialidad}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="">Fecha de reserva</label>
                          <input type="date" id="fecha_reserva" value="<?php echo date('Y-m-d'); ?>" name="fecha_reserva" class="form-control">

                          <script>
                            document.addEventListener('DOMContentLoaded', function() {
                              const fechaReservaInput = document.getElementById('fecha_reserva');

                              fechaReservaInput.addEventListener('change', function() {
                                let selectedDate = this.value;

                                let today = new Date().toISOString().slice(0, 10);

                                if (selectedDate < today) {
                                  this.value = null;
                                  alert('No se puede seleccionar una fecha pasada');
                                }
                              });
                            });
                          </script>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="">Hora de reserva</label>
                          <input type="time" name="hora_reserva" id="hora_reserva" class="form-control">
                          @error('hora_reserva')
                          <small style="color:red">{{$message}}</small>
                          @enderror
                          @if (($message = Session::get('hora_reserva')))
                          <script>
                            document.addEventListener('DOMContentLoaded', function() {
                              $('#exampleModal').modal('show');
                            });
                          </script>
                          <small style="color:red">{{$message}}</small>
                          @endif
                          <script>
                            document.addEventListener('DOMContentLoaded', function() {
                              const horaReservaInput = document.getElementById('hora_reserva');


                              horaReservaInput.addEventListener('change', function() {
                                let selectedTime = this.value;


                                if (selectedTime) {
                                  selectedTime = selectedTime.split(':');
                                  selectedTime = selectedTime[0] + ':00';

                                  this.value = selectedTime;
                                }

                                if (selectedTime < '08:00' || selectedTime > '18:00') {


                                  this.value = null;
                                  alert('Por favor, seleccione una hora entre las 08:00 y las 18:00');
                                }
                              });
                            });
                          </script>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div id='calendar'></div>
      </div>
    </div>
  </div>
</div>
@endcan


@if(Auth::check() && Auth::user()->doctores)
<div class="row">
  <div class="col-md-12">
    <div class="card card-outline card-primary">
      <div class="card-header">
        <h3 class="card-title">Calendario de reservas</h3>
        <br>

      </div>
      <div class="card-body">

        <table id="example1" class="table table-striped table-bordered table-hover table-sm">
          <thead class="table-dark">
            <tr>
              <td><b>Nro</b></td>
              <td><b>Usuario</b></td>
              <td style="text-align: center;"><b>Fecha de reserva</b></td>
              <td style="text-align: center;"><b>Hora de reserva</b></td>
            </tr>
          </thead>
          <tbody>
            <?php $contador = 1; ?>
            @foreach($eventos as $evento)
            @if(Auth::user()->doctores->id == $evento->doctor_id)
            <tr>
              <td>{{$contador++}}</td>
              <td>{{$evento->user->name}}</td>
              <td>{{\carbon\carbon::parse($evento->start)->format('Y-m-d')}}</td>
              <td>{{\carbon\carbon::parse($evento->start)->format('H:i')}}</td>
      </div>
      </td>
      </tr>
      @endif

      @endforeach
      </tbody>
      </table>


      <script>
        $(function() {
          $("#example1").DataTable({
            "pageLength": 5,
            "language": {
              "emptyTable": "No hay información",
              "info": "Mostrando _START_ a _END_ de _TOTAL_ reservas",
              "infoEmpty": "Mostrando 0 a 0 de 0 reservas",
              "infoFiltered": "(Filtrado de _MAX_ total reservas)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar _MENU_ consultorios",
              "loadingRecords": "Cargando...",
              "processing": "Procesando...",
              "search": "Buscador:",
              "zeroRecords": "Sin resultados encontrados",
              "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
              }
            },
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            buttons: [{
                extend: 'collection',
                text: 'Reportes',
                orientation: 'landscape',
                buttons: [{
                  text: 'Copiar',
                  extend: 'copy',
                }, {
                  extend: 'pdf'
                }, {
                  extend: 'csv'
                }, {
                  extend: 'excel'
                }, {
                  text: 'Imprimir',
                  extend: 'print'
                }]
              },
              {
                extend: 'colvis',
                text: 'Visor de columnas',
                collectionLayout: 'fixed three-column'
              }
            ],
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
      </script>
    </div>
  </div>
</div>
</div>
@endif


@endsection