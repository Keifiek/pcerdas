<x-mail::message>
# Se realizo una compra en tu cuenta:

<x-mail::panel>
La compra se realizo con un valor de: {{ $venta->total }}
</x-mail::panel> 

<x-mail::button :url="route('ventas.index')">
Ver tu lista de compras
</x-mail::button>

Gracias,<br>
{{ config('app.name') }}
</x-mail::message>