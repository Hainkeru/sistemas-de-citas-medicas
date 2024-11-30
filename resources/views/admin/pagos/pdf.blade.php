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

    <h2 style="text-align: center;"><u>COMPROBANTE DE PAGO</u></h2>

    <br>

    <table border="0" cellpadding="5px" cellspacing="5px">
        <tr>
            <td width="120px"><b>Sr(es): </b></td>
            <td>{{$pago->paciente->apellidos." ".$pago->paciente->nombres}}</td>
            <td width="150px" rowspan="4"></td>
            <td rowspan="4">
                <div>
                    <img src="data:image/png;base64,{{$qrCodeBase64}}" alt="Codigo QR" width="150px">
                </div>
            </td>
        </tr>
        <tr>
            <td><b>Fecha: </b></td>
            <td>{{$pago->fecha_pago}}</td>
        </tr>
        <tr>
            <td><b>Especialidad: </b></td>
            <td>{{$pago->doctor->especialidad}}</td>
        </tr>
        <tr>
            <td><b>Monto: </b></td>
            <td>{{$pago->monto}}</td>
        </tr>
    </table>

    <br><br>
    <table border="0" style="font-size: 9pt;">
        <tr>
            <td width=210px>
                <p style="text-align: center;">
                    _____________________ <br>
                    <b>Secretaria</b> <br>
                    {{Auth::user()->secretarias->apellidos." ".Auth::user()->secretarias->nombres}}
                </p>
            </td>
            <td width=210px></td>
            <td width=210px>
                <p style="text-align: center;">
                    ______________________ <br>
                    <b>Recibí conforme</b> <br>
                </p>
            </td>
        </tr>
    </table>

    <P>-----------------------------------------------------------------------------------------------------------------------------</P>

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

    <h2 style="text-align: center;"><u>COMPROBANTE DE PAGO</u></h2>

    <br>

    <table border="0" cellpadding="5px" cellspacing="5px">
        <tr>
            <td width="120px"><b>Sr(es): </b></td>
            <td>{{$pago->paciente->apellidos." ".$pago->paciente->nombres}}</td>
            <td width="150px" rowspan="4"></td>
            <td rowspan="4">
                <div>
                    <img src="data:image/png;base64,{{$qrCodeBase64}}" alt="Codigo QR" width="150px">
                </div>
            </td>
        </tr>
        <tr>
            <td><b>Fecha: </b></td>
            <td>{{$pago->fecha_pago}}</td>
        </tr>
        <tr>
            <td><b>Especialidad: </b></td>
            <td>{{$pago->doctor->especialidad}}</td>
        </tr>
        <tr>
            <td><b>Monto: </b></td>
            <td>{{$pago->monto}}</td>
        </tr>
    </table>

    <br><br>
    <table border="0" style="font-size: 9pt;">
        <tr>
            <td width=210px>
                <p style="text-align: center;">
                    _____________________ <br>
                    <b>Secretaria</b> <br>
                    {{Auth::user()->secretarias->apellidos." ".Auth::user()->secretarias->nombres}}
                </p>
            </td>
            <td width=210px></td>
            <td width=210px>
                <p style="text-align: center;">
                    ______________________ <br>
                    <b>Recibí conforme</b> <br>
                </p>
            </td>
        </tr>
    </table>

</body>

</html>