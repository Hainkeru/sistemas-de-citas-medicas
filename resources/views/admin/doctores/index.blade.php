@extends('layouts.admin')
@section('content')
  


<br>
  <div class="row">
  <div class="col-md-12">
  <div class="card card-outline card-primary">
<div class="card-header">
<h3 class="card-title"> Doctores registrados</h3>
<div class="card-tools">
    <a href="{{url('admin/doctores/create')}}" class="btn btn-primary">
        Registrar nuevo
    </a>
</div>

</div>

<div class="card-body">

<table id="example1" class = "table table-striped table-bordered table-hover table-sm">
        <thead class="table-dark">
            <tr>
                <td><b>Nro</b></td>
                <td><b>Nombre</b></td>
                <td style="text-align: center;"><b>Apellidos</b></td>
                <td style="text-align: center;"><b>Telefono</b></td>
                <td style="text-align: center;"><b>Licencia Medica</b></td>
                <td style="text-align: center;"><b>Especialidad</b></td>
                <td><b>Acciones</b></td>
            </tr>
        </thead>
        <tbody>
            <?php $contador = 1;?>
            @foreach($doctores as $doctor)
                <tr>
                    <td>{{$contador++}}</td>
                    <td>{{$doctor->nombre}}</td>
                    <td>{{$doctor->apellidos}}</td>
                    <td>{{$doctor->telefono}}</td>
                    <td>{{$doctor->licencia_medica}}</td>
                    <td>{{$doctor->especialidad}}</td>
                    <td style="text-align: center"><div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{url('/admin/doctores/'.$doctor->id)}}" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                        <a href="{{url('/admin/doctores/'.$doctor->id.'/edit')}}" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                        <a href="{{url('/admin/doctores/'.$doctor->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm"><i class="bi bi-eraser"></i></button>
                    </div></td>
                </tr>
            @endforeach
        </tbody>
    </table>
  

<script>
    $(function () {
         $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ doctores",
                "infoEmpty": "Mostrando 0 a 0 de 0 doctores",
                "infoFiltered": "(Filtrado de _MAX_ total doctores)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ doctores",
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

