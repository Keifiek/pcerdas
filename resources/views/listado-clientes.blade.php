<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Listado de clientes</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Mensaje</th>
            </tr>
        </thead>
        <tbody>
            @foreach($datos as $dato)
            <tr>
                <td>{{$dato->nombre}}</td>
                <td>{{$dato->correo}}</td>
                <td>{{$dato->contraseña}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>