<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Listado de proveedores</h1>

    <a href="/proveedor">Regresar al listado </a>

    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Direccion</th>
            </tr>
        </thead>
        
        <tbody>            
            <tr>
                <td>{{$proveedor->nombre}}</td>
                <td>{{$proveedor->telefono}}</td>
                <td>{{$proveedor->direccion}}</td>
                <td><a href="{{ route('proveedor.edit', $proveedor) }}">Editar</a></td>
            </tr>
        </tbody>
    </table>
    <form action="{{ route('proveedor.destroy', $proveedor) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Eliminar el proveedor">
    </form>
</body>
</html> 