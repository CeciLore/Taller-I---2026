<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Factura extends Model
{
    protected $table = 'facturas';

    public $timestamps = false;

    protected $fillable = [
        'usuario_id',
        'fecha',
        'total',
        'metodo_pago',
        'estado'
    ];

    public function usuario()
    {
        return $this->belongsTo(
            User::class,
            'usuario_id'
        );
    }

    public function detalles()
    {
        return $this->hasMany(
            DetalleFactura::class,
            'factura_id'
        );
    }
}