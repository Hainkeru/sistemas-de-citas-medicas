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

    <h2 style="text-align: center;"><u>Historial clinico</u></h2>

    <br>
    <hr>

    <h3>Información del paciente</h3>

    <table>
        <tr>
            <td><b>Paciente:</b></td>
            <td>{{$historial->paciente->apellidos." ".$historial->paciente->nombres}}</td>
        </tr>
        <tr>
            <td><b>Identificacion:</b></td>
            <td>{{$historial->paciente->cc}}</td>
        </tr>
        <tr>
            <td><b>Fecha de nacimiento:</b></td>
            <td>{{$historial->paciente->fecha_nacimiento}}</td>
        </tr>
        <tr>
            <td><b>Genero:</b></td>
            <td>{{$historial->paciente->genero}}</td>
        </tr>
    </table>

    <br>
    <hr>

    <h3>Información del doctor</h3>

    <table>
        <tr>
            <td><b>Doctor:</b></td>
            <td>{{$historial->doctor->apellidos." ".$historial->doctor->nombre}}</td>
        </tr>
        <tr>
            <td><b>Identificacion:</b></td>
            <td>{{$historial->doctor->licencia_medica}}</td>
        </tr>
        <tr>
            <td><b>Fecha de nacimiento:</b></td>
            <td>{{$historial->doctor->especialidad}}</td>
        </tr>
    </table>

    <h3>Diagnostico realizado</h3>

    <table>
        <tr>
            <td><b>Fecha:</b></td>
            <td>{{$historial->fecha_visita}}</td>
        </tr>
        <tr>
            <td><b>Resultado:</b></td>
            <td>{!!$historial->details!!}</td>
        </tr>
    </table>

</body>

</html>