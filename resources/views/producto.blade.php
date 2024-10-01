<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Fomulario de registro de productos</h1>
    <a href="/producto">Regresar al listado </a>
    @if (isset($producto))

        <form action="{{route('producto.update', $producto) }}" method="POST">
            @method('PATCH')
    @else
        <form action="/guardar-productos" method="POST">
    @endif
        @csrf

        <label>Descripcion:<br><input type="text" name="descripcion" value="{{ isset($producto) ? $producto->descripcion : old('descripcion') }}"></label>
        @error('descripcion')
            <div style="color: red;">{{ $message }}</div>
        @enderror       
        <br>

        <label>Precio:<br><input type="number" step="0.01" name="precio" value="{{ isset($producto) ? $producto->precio : old('precio') }}"></label>
        @error('precio')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br>

        <label>Categoria:<br><input type="text" name="categoria" value="{{ isset($producto) ? $producto->categoria : old('categoria') }}"></label>
        @error('categoria')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br>
        <label>Stock:<br><input type="number" name="stock" value="{{ isset($producto) ? $producto->stock : old('stock') }}"></label>
        @error('stock')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>