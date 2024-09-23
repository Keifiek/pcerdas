<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Listado de clientes</h1>

    <a href="/cliente">Regresar al listado </a>

    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Mensaje</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>            
            <tr>
                <td>{{$cliente->nombre}}</td>
                <td>{{$cliente->correo}}</td>
                <td>{{$cliente->contraseña}}</td>
                <td><a href="{{ route('cliente.edit', $cliente) }}">Editar</a></td>
            </tr>
        </tbody>
    </table>
    <form action="{{ route('cliente.destroy', $cliente) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Eliminar el cliente">
    </form>
</body>
</html> 