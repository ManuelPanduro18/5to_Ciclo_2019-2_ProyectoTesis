<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Visita pendiente</title>
</head>
<body>
    <p>Hola! Se reporta una nueva visita : {{ $reservationsCall->created_at}}.</p>

    <p style="font-size: 16px"><b>OFICINA 403</b></p>

    <p>Estimados, por favor dar las siguientes facilidades de ingreso a la(s) siguiente(s) persona(s):</p>

    <table class="table">
        <tbody>
        <tr>
          <th scope="row" style="text-align: left;">Nombres:</th>
          <td class="table-info" style="text-align: center;">{{ $reservationsCall->nombres }}</td>
        </tr>

        <tr>
          <th scope="row" style="text-align: left;">Apellidos:</th>
          <td class="table-info" style="text-align: center;">{{ $reservationsCall->apellidos }}</td>
        </tr>

        <tr>
          <th scope="row" style="text-align: left;">Tipo de documento:</th>
          <td class="table-info" style="text-align: center;">{{ $reservationsCall->documento }}</td>
        </tr>

        <tr>
          <th scope="row" style="text-align: left;">N° Documento:</th>
          <td class="table-info" style="text-align: center;">{{$reservationsCall->num_documento}}</td>
        </tr>

        <tr>
          <th scope="row" style="text-align: left;">Placa del Auto:</th>
          <td class="table-info" style="text-align: center;">{{$reservationsCall->num_placa}}</td>
        </tr>

        <tr>
          <th scope="row" style="text-align: left;">Persona a visitar:</th>
          <td class="table-info" style="text-align: center;">{{$reservationsCall->visitado}}</td>
        </tr>
     </tbody>
    </table>
    <br>
    <p>Saludos.</p>
    <div style="font-size: 14px;"><b>RECEPCIÓN NETCORPORATE</b></div>
    <div style="font-size: 12px;">Teléfono: +511 6403310 anexo 2</div>
    <div style="font-size: 12px;">Netcorporate S.A.C</div>   
    <div style="font-size: 12px;">Av. Nicolás Arriola N° 314 of. 403</div>   
    <div style="font-size: 12px;">Santa Catalina - La Victoria - Lima - Perú</div>
    <div style="font-size: 12px;">Netcorporate.net/www.netcorporate.net</div>
    <div style="font-size: 12px;">Service Desk | Telefonía VoIP | Outsourcing TI</div>
</body>
</html>