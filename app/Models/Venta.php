<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    //
    protected $fillable = [
        'cliente_id',
        'total',
    ];
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
    public function productos(){
        return $this->hasMany(VentaProducto::class, 'venta_id');
    }
}
