<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [

        'nombre',
        'descripcion',
        'precio',
        'stock',
        'categoria_id',
        'url_imagen',
        'activo',
    ];

    protected $casts = [

        'precio' => 'decimal:2',
        'stock' => 'integer',
        'activo' => 'boolean',
    ];

    public function categoria()
    {
        return $this->belongsTo(
            Categoria::class,
            'categoria_id'
        );
    }
}