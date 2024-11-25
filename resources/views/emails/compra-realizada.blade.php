<x-mail::message>
# Se realizo una compra en tu cuenta:

<x-mail::panel>
La venta se realizo con un valor de: {{ $compra->total }}
</x-mail::panel> 

<x-mail::button :url="route('compras.index')">
Ver tu lista de ventas
</x-mail::button>

Gracias,<br>
{{ config('app.name') }}
</x-mail::message>