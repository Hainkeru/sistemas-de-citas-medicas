@extends('layouts.admin')
@section('content')
  




<br>
  <div class="row">
  <div class="col-md-12">
  <div class="card card-outline card-primary">
<div class="card-header">
<h3 class="card-title">Listado de configuracion</h3>
<div class="card-tools">
    <a href="{{url('admin/configuraciones/create')}}" class="btn btn-primary">
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
                <td style="text-align: center;"><b>Direccion</b></td>
                <td style="text-align: center;"><b>Telefono</b></td>
                <td style="text-align: center;"><b>Correo</b></td>
                <td style="text-align: center;"><b>Logo</b></td>
                <td><b>Acciones</b></td>
            </tr>
        </thead>
        <tbody>
            <?php $contador = 1;?>
            @foreach($configuraciones as $configuracion)
                <tr>
                    <td>{{$contador++}}</td>
                    <td>{{$configuracion->nombre}}</td>
                    <td>{{$configuracion->direccion}}</td>
                    <td>{{$configuracion->telefono}}</td>
                    <td>{{$configuracion->correo}}</td>
                    <td>
                        <img src="{{url('/storage/'.$configuracion->logo)}}" alt="logo" width="100px">
                    </td>
                    <td style="text-align: center"><div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{url('/admin/configuraciones/'.$configuracion->id)}}" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                        <a href="{{url('/admin/configuraciones/'.$configuracion->id.'/edit')}}" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                        <a href="{{url('/admin/configuraciones/'.$configuracion->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm"><i class="bi bi-eraser"></i></button>
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

