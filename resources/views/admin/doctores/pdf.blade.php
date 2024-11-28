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

    <h2 style="text-align: center;"><u>Listado del personal medico</u></h2>

    <br>

    <table class="table table-bordered table-sm table-striped">
        <thead>
            <tr style="background-color: #e7e7e7">
                <th>Nro</th>
                <th>Apellidos y nombres</th>
                <th>Telefono</th>
                <th>Licencia medica</th>
                <th>Especialidad</th>
            </tr>

        </thead>
        <tbody>
            <?php $contador = 1; ?>
            @foreach($doctores as $doctor)
            <tr>
                <td>{{$contador++}}</td>
                <td>{{$doctor->apellidos." ".$doctor->nombre}}</td>
                <td>{{$doctor->telefono}}</td>
                <td>{{$doctor->licencia_medica}}</td>
                <td>{{$doctor->especialidad}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>