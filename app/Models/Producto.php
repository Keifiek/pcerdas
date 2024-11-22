<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    public function ventas(){
        return $this->belongsToMany(Venta::class);
    }
    public function compras(){
        return $this->belongsToMany(Compra::class);
    }
}
