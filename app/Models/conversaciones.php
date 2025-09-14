<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class conversaciones extends Model
{
    use HasFactory;

    protected $fillable = [
        'senior_id',
        'mensaje_usuario',
        'respuesta_IA',
        'fecha_hora',
    ];

    // Relación con user
    public function senior()
    {
        return $this->belongsTo(Senior::class);
    }
    
}
