<x-mail::message>
# Se publicó una nueva producto no te quedes sin el tuyo

<x-mail::panel>
{{ $producto->descripcion }}
{{ $producto->precio }}
</x-mail::panel> 

<x-mail::button :url="route('producto.show', $producto)">
Ver Producto
</x-mail::button>

Gracias,<br>
{{ config('app.name') }}
</x-mail::message>