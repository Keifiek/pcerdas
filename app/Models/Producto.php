<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'descripcion',
        'precio',
        'categoria',
        'stock',
    ];

    use HasFactory;
    public function ventaProducto(){
        return $this->hasMany(VentaProducto::class, 'producto_id');
    }
    public function compraProducto(){
        return $this->hasMany(CompraProducto::class, 'producto_id');
    }
}
