<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $table = 'carritos';

    protected $fillable = [
        'user_id'
    ];

    public function items()
    {
        return $this->hasMany(
            CarritoItem::class,
            'carrito_id'
        );
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}