<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'direccion'];

    // Relación con User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function compras (){
        return $this->hasMany(Compra::class);
    }
}
