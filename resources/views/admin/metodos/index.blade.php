@extends('layouts.admin')
@section('content')


<div class="row">
    <h1>Metodos de pago disponibles</h1>
</div>


<br>
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            

            <div class="card-body">

                <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                    <thead class="table-dark">
                        <tr>
                            <td><b>Nro</b></td>
                            <td><b>Tipo</b></td>
                            <td style="text-align: center;"><b>Numero</b></td>
                            <td style="text-align: center;"><b>Descripcion</b></td>
                            <td style="text-align: center;"><b>Logo</b></td>
                            <td style="text-align: center;">Codigo QR</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $contador = 1; ?>

                        <tr>
                            <td>{{$contador++}}</td>
                            <td>Nequi</td>
                            <td>3053437092</td>
                            <td>Pagos virtuales desde tu telefono facilmente</td>
                            <td>
                                <div style="text-align: center;"">
                                <img src="https://streamcodex.online/images/methods/medio_pago_3.jpg?reload=533222094 " width="100">
                                </div>
                            </td>
                            <td>
                                <a href="https://drive.google.com/file/d/1TxKwZxyseyuPqUSEgjgK7Yf8P1NXtkZc/view?usp=sharing">Codigo de pagos</a>
                            </td>
                        </tr>

                    </tbody>
                </table>



            </div>


        </div>
    </div>
</div>




@endsection