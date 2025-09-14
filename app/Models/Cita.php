<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;
    protected $fillable = [
        'senior_id',
        'registrado_por',
        'titulo',
        'descripcion',
        'fecha_hora',
        'estado',
    ];

    public function senior()
    {
        return $this->belongsTo(Senior::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'registrado_por');
    }
}
