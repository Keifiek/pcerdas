<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    //

    protected $fillable = [
        'proveedor_id',
        'total',
    ];

    public function proveedor (){
        return $this->belongsTo(Proveedor::class);
    }
    public function productos(){
        return $this->hasMany(CompraProducto::class, 'compra_id');
    }
}
