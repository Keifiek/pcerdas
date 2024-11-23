<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CompraProducto extends Model
{
    use HasFactory;

    // Nombre de la tabla (si es diferente al plural automático)
    protected $table = 'compra_producto';

    // Campos asignables
    protected $fillable = [
        'compra_id',
        'producto_id',
        'cantidad',
    ];

    // Relación con la tabla Compra
    public function compra()
    {
        return $this->belongsTo(Compra::class, 'compra_id');
    }

    // Relación con la tabla Producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
