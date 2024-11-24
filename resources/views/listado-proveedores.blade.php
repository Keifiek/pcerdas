<x-layaout>
@can ('viewAny', App\Models\Proveedor::class)
    <h1>Listado de proveedores</h1>

    <a href="/proveedor/create">Ingresar un nuevo proveedor </a>

    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Direccion</th>
                <th>Contraseña</th>
                <th>Acciones</th>
                <th>Acciones</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($proveedors as $proveedor)
            <tr>
                <td>{{$proveedor->user->name}}</td>
                <td>{{$proveedor->user->email}}</td>
                <td>{{$proveedor->direccion}}</td>
                <td>{{$proveedor->user->password}}</td>
                <td><a href="{{ route('proveedor.show', $proveedor) }}">Mostrar detalles</a></td>
                <td><a href="{{ route('proveedor.edit', $proveedor) }}">Editar</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <h2>No puedes acceder a la lista de proveedores si no eres un administrador</h2>
    @endcan
</x-layaout>