<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $table = 'consultas';

    protected $primaryKey = 'id';

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = null;

    protected $fillable = [
        'usuario_id',
        'asunto',
        'mensaje',
        'respuesta',
        'estado',
        'fecha_respuesta',
        'activo'
    ];

    protected $casts = [
        'fecha_creacion' => 'datetime',
        'fecha_respuesta' => 'datetime',
        'activo' => 'boolean'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}