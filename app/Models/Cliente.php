<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['user_id'];

    // Relación con User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function ventas (){
        return $this->hasMany(Venta::class);
    }
}
