<x-layaout>
@can ('viewAny', App\Models\Proveedor::class)
    <h1>Listado de proveedores</h1>

    <a href="/proveedor">Regresar al listado </a>

    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Direccion</th>
                <th>Contraseña</th>
                <th>Acciones</th>
            </tr>
        </thead>
        
        <tbody>            
            <tr>
                <td>{{$proveedor->user->name}}</td>
                <td>{{$proveedor->user->correo}}</td>
                <td>{{$proveedor->direccion}}</td>
                <td>{{$proveedor->user->password}}</td>
                <td><a href="{{ route('proveedor.edit', $proveedor) }}">Editar</a></td>
            </tr>
        </tbody>
    </table>
    <form action="{{ route('proveedor.destroy', $proveedor) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Eliminar el proveedor">
    </form>
    @else
    <h2>No puedes acceder a esta seccion si no eres un administrador</h2>
    @endcan
</x-layaout>