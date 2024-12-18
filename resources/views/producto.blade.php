<x-layaout>
@auth
    @if (Auth::user()->id == 1)
        <h1>Fomulario de registro de productos</h1>
        <a href="/producto">Regresar al listado </a>
        @if (isset($producto))

            <form action="{{route('producto.update', $producto) }}" method="POST">
                @method('PATCH')
        @else
            <form action="{{route('producto.store') }}" method="POST">
        @endif
            @csrf

            <label>Descripcion:<br><input type="text" name="descripcion" value="{{ isset($producto) ? $producto->descripcion : old('descripcion') }}"></label>
            @error('descripcion')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror       
            <br>

            <label>Precio:<br><input type="number" step="0.01" name="precio" value="{{ isset($producto) ? $producto->precio : old('precio') }}"></label>
            @error('precio')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>

            <label>Categoria:<br><input type="text" name="categoria" value="{{ isset($producto) ? $producto->categoria : old('categoria') }}"></label>
            @error('categoria')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <label>Stock:<br><input type="number" name="stock" value="{{ isset($producto) ? $producto->stock : old('stock') }}"></label>
            @error('stock')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <input type="submit" value="Enviar">
        </form>
    @else
        <h2>Solo los administradores pueden agregar productos comunicate directamente por correo</h2>
        <a href="mailto:cesar.aguilar4629@alumnos.udg.mx">Enviar un correo</a>
    @endif
@endauth
</x-layaout>