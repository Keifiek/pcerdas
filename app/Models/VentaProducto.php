<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaProducto extends Model
{
    use HasFactory;
    //
    protected $table = 'producto_venta';

    // Campos asignables
    protected $fillable = [
        'venta_id',
        'producto_id',
        'cantidad',
    ];

    // Relación con la tabla Compra
    public function venta()
    {
        return $this->belongsTo(Venta::class);
    }

    // Relación con la tabla Producto
    public function producto()
    {
        return $this->belongsTo(Producto::class,'producto_id');
    }
}
