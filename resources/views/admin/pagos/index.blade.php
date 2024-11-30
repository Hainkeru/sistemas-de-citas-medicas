@extends('layouts.admin')
@section('content')
  




<br>
  <div class="row">
  <div class="col-md-12">
  <div class="card card-outline card-primary">
<div class="card-header">
<h3 class="card-title">Listado de pagos</h3>
<div class="card-tools">
    <a href="{{url('admin/pagos/create')}}" class="btn btn-primary">
        Registrar nuevo
    </a>
</div>

</div>

<div class="card-body">

<table id="example1" class = "table table-striped table-bordered table-hover table-sm">
        <thead class="table-dark">
            <tr>
                <td><b>Nro</b></td>
                <td style="text-align: center;"><b>Monto</b></td>
                <td style="text-align: center;"><b>Fecha de pago</b></td>
                <td style="text-align: center;"><b>Descripcion</b></td>
                <td style="text-align: center;"><b>Paciente</b></td>
                <td style="text-align: center;"><b>Doctor</b></td>
                <td><b>Acciones</b></td>
            </tr>
        </thead>
        <tbody>
            <?php $contador = 1;?>
            @foreach($pagos as $pago)
                <tr>
                    <td>{{$contador++}}</td>
                    <td>{{"$ ".$pago->monto}}</td>
                    <td>{{$pago->fecha_pago}}</td>
                    <td>{{$pago->descripcion}}</td>
                    <td>{{$pago->paciente->apellidos." ".$pago->paciente->nombres}}</td>
                    <td>{{$pago->doctor->apellidos." ".$pago->doctor->nombre}}</td>
                    <td style="text-align: center"><div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{url('/admin/pagos/pdf/'.$pago->id)}}" type="button" class="btn btn-warning btn-sm"><i class="bi bi-printer"></i></a>
                        <a href="{{url('/admin/pagos/'.$pago->id.'/edit')}}" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                        <a href="{{url('/admin/pagos/'.$pago->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm"><i class="bi bi-eraser"></i></button>
                    </div></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    <p><h4>Resumen total del monto de pagos {{$total_monto}}</h4></p>
  

<script>
    $(function () {
         $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Configuracion",
                "infoEmpty": "Mostrando 0 a 0 de 0 Configuraciones",
                "infoFiltered": "(Filtrado de _MAX_ total Configuraciones)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Configuraciones",
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
                    "responsive": true, "lengthChange": true, "autoWidth": false,
                    buttons: [{
                    extend: 'collection',
                    text: 'Reportes',
                    orientation: 'landscape',
                                    buttons: [{
                                        text: 'Copiar',
                                        extend: 'copy',
                                    }, {
                                        extend: 'pdf'
                                    },{
                                        extend: 'csv'
                                    },{
                                        extend: 'excel'
                                    },{
                                        text: 'Imprimir',
                                        extend: 'print'
                                    }
                                    ]
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




@endsection

