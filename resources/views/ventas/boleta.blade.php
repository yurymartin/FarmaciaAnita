<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        body, p {
            text-align: center;
            font-size: 10px;
            font-family: 'Times New Roman', Times, serif;
            margin-top: -70px;
        }
        table{
            margin-left: -30px;
            margin-right: -40px;
            margin-top: -10px;
        }
    </style>
</head>

<body>
    <h5 style="font-size: 18px">BOTICA ANITA <img src="../public/img/logo.jpg" alt="" width="50px" height="50px" style="margin-top: 15px"></h5>
    <p style="opacity: 0.4;margin-top: -10px;margin-left: -14px">BOTICAANITA S.A.C - RUC: 845214785200</p>
    <p style="margin-top: -10px;opacity: 0.4;margin-left: -10px">AV.CENTENARIO #254 - INDEPENDENCIA</p>
    <p style="margin-top: -10px;opacity: 0.4">ANCASH - HUARAZ</p>
    <p style="margin-top: 0px;margin-left: -10px""><b>{{$venta->tipo_comprobantes->tipo}}:{{$venta->serie_comprobante}}-{{$venta->num_comprobante}}</b></p>
    <p style="margin-top: 0px"><b>FECHA EMISION:</b> {{$venta->created_at}}</p>
    <p style="margin-top: -10px"><b>VENDEDOR:</b>{{Auth::user()->empleados->personas->nombres}}</p>
    <p style="margin-top: -10px">****************************************************</p>
    <p style="margin-top: -10px"><b>Señor(a)</b>. {{$venta->clientes->personas->nombres}} {{$venta->clientes->personas->apellidos}}</p>
    <p style="margin-top: -10px"><b>DNI:</b> {{$venta->clientes->personas->dni}}</p>
    <p style="margin-top: -10px"><b>DIRECCIÓN:</b> {{$venta->clientes->personas->direccion}}</p>
    <p style="margin-top: -10px;font-size: 10px;">****************************************************</p>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Descripcion</th>
                <th>Cant.</th>
                <th>P.Unit</th>
                <th>Importe</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detalles as $detalle)
            <tr>
                <td>{{$detalle->productos->codigo}}</td>
                <td style="text-align: left">{{$detalle->productos->nom}}</td>
                <td>{{$detalle->cantidad}}</td>
                <td>{{$detalle->precio_venta}}</td>
                <td>{{$detalle->cantidad * $detalle->precio_venta-$detalle->descuento}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <p style="margin-top: 0px">****************************************************</p>
    <p style="margin-top: -10px;text-align: right"><b>SUB TOTAL: </b> S/.{{$venta->total_venta - ($venta->total_venta * 0.18)}}</p>
    <p style="margin-top: -10px;text-align: right"><b>IGV: </b> S/.{{($venta->total_venta*0.18)}}</p>
    <p style="margin-top: -10px;text-align: right"><b>TOTAL: </b> S/.{{$venta->total_venta}}</p>
    <p style="margin-top: -10px">****************************************************</p>
    <p style="margin-top: 0px">WWW.BOTICAANITA.COM.PE</p>
    <p style="margin-top: 0px"><b>¡GRACIAS POR SU COMPRA!</b></p>
    <img src="../public/img/qr.png" alt="" width="50px" height="50px">
</body>

</html>
