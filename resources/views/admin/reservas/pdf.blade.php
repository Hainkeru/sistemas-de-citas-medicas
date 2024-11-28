<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/PROJECT/user/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <table border="0" style="font-size: 10pt">
        <tr>
            <td style="text-align: left;">
                {{$configuracion->nombre}} <br>
                {{$configuracion->direccion}} <br>
                {{$configuracion->telefono}} <br>
                {{$configuracion->correo}} <br>
            </td>
            <td width="330px"></td>
            <td>
                <img src="{{public_path('storage/'.$configuracion->logo)}}" alt="logo" width="100px">
            </td>
        </tr>


    </table>

    <h2 style="text-align: center;"><u>Listado todas las reservas</u></h2>

    <br>

    <table class="table table-bordered table-sm table-striped">
        <thead>
            <tr style="background-color: #e7e7e7">
                <th>Nro</th>
                <th>Doctor</th>
                <th>Especialidad</th>
                <th>Fecha de reserva</th>
                <th>Hora de reserva</th>
            </tr>

        </thead>
        <tbody>
            <?php $contador = 1; ?>
            @foreach($eventos as $evento)
            <tr>
                <td>{{$contador++}}</td>
                <td>{{$evento->doctor->nombre." ".$evento->doctor->apellidos}}</td>
                <td>{{$evento->doctor->especialidad}}</td>
                <td>{{\carbon\carbon::parse($evento->start)->format('Y-m-d')}}</td>
                <td>{{\carbon\carbon::parse($evento->start)->format('H:i')}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>