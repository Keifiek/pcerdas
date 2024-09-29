<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Listado de proveedores</h1>

    <a href="/proveedor/create">Ingresar un nuevo proveedor </a>

    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Direccion</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($proveedors as $proveedor)
            <tr>
                <td>{{$proveedor->nombre}}</td>
                <td>{{$proveedor->telefono}}</td>
                <td>{{$proveedor->direccion}}</td>
                <td><a href="{{ route('proveedor.show', $proveedor) }}">Mostrar detalles</a></td>
                <td><a href="{{ route('proveedor.edit', $proveedor) }}">Editar</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>