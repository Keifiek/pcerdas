<x-layaout>
@can ('viewAny', App\Models\Proveedor::class)
    <h1>Fomulario de registro de Proveedores</h1>
    <a href="/proveedor">Regresar al listado </a>
    @if (isset($proveedor))

        <form action="{{route('proveedor.update', $proveedor) }}" method="POST">
            @method('PATCH')
    @else
        <form action="{{route('proveedor.store') }}" method="POST">
    @endif
        @csrf
        <label>Nombre:<br><input type="text" name="nombre" value="{{ isset($proveedor) ? $proveedor->nombre : old('nombre') }}"></label><br>
        <label for="">Telefono:<br><input id="telefono"type="text" name="telefono" value ="{{ isset($proveedor) ? $proveedor->telefono : old('telefono') }}" class="@error('telefono') is-invalid @enderror"></label><br>
        @error('telefono')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        <label for="">Direccion:<br><input type="text" name="direccion" value="{{ isset($proveedor) ? $proveedor->direccion : old('direccion') }}"></input></label><br>
        <br>
        <label for="">Contraseña:<br><input type="password" name="password" value="{{ isset($proveedor) ? $proveedor->password : old('password') }}"></input></label><br>
        <input type="submit" value="Enviar">
    </form>
    @else
    <h2>No puedes acceder a esta seccion si no eres un administrador</h2>
    @endcan
</x-layaout>