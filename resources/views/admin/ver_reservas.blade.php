@extends('layouts.admin')
@section('content')





<br>
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title"> Reservas registradas</h3>

            </div>

            <div class="card-body">

                <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                    <thead class="table-dark">
                        <tr>
                            <td><b>Nro</b></td>
                            <td><b>Doctor</b></td>
                            <td style="text-align: center;"><b>Especialidad</b></td>
                            <td style="text-align: center;"><b>Fecha de reserva</b></td>
                            <td style="text-align: center;"><b>Hora de reserva</b></td>
                            <td style="text-align: center;"><b>Fecha y hora de registro</b></td>
                            <td><b>Acciones</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $contador = 1; ?>
                        @foreach($eventos as $evento)
                        <tr>
                            <td>{{$contador++}}</td>
                            <td>{{$evento->doctor->nombre}} {{$evento->doctor->apellidos}}</td>
                            <td>{{$evento->doctor->especialidad}}</td>
                            <td>{{\carbon\carbon::parse($evento->start)->format('Y-m-d')}}</td>
                            <td>{{\carbon\carbon::parse($evento->start)->format('H:i')}}</td>
                            <td>{{$evento->created_at}}</td>
                            <td style="text-align: center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <form action="{{url('/admin/eventos/destroy', $evento->id)}}" id="formulario{{$evento->id}}" onsubmit="return preguntar(event, {{$evento->id}})" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-eraser"></i>
                                        </button>
                                    </form>
                                    <script>
                                        function preguntar(event, id) {
                                            event.preventDefault();
                                            Swal.fire({
                                                title: "¿Estás seguro que deseas eliminar la reserva?",
                                                text: "Si elimina esta reserva, la hora quedará disponible para otro usuario",
                                                icon: "question",
                                                showCancelButton: true,
                                                confirmButtonText: "Eliminar",
                                                cancelButtonText: `Cancelar`
                                            }).then((result) => {
                                                /* Read more about isConfirmed, isDenied below */
                                                if (result.isConfirmed) {
                                                    document.getElementById('formulario' + id).submit();
                                                } else if (result.isDenied) {
                                                    Swal.fire("Ha cancelado la acción", "", "info");
                                                }
                                            });
                                        }
                                    </script>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>


                <script>
                    $(function() {
                        $("#example1").DataTable({
                            "pageLength": 5,
                            "language": {
                                "emptyTable": "No hay información",
                                "info": "Mostrando _START_ a _END_ de _TOTAL_ Reservas",
                                "infoEmpty": "Mostrando 0 a 0 de 0 Reservas",
                                "infoFiltered": "(Filtrado de _MAX_ total Reservas)",
                                "infoPostFix": "",
                                "thousands": ",",
                                "lengthMenu": "Mostrar _MENU_ Reservas",
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




@endsection