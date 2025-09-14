<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recordatorios extends Model
{
    use HasFactory;

    protected $fillable = [
        'senior_id',
        'titulo',
        'descripcion',
        'fecha_hora',
        'estado',
    ];

    public function senior()
    {
        return $this->belongsTo(Senior::class);
    }
}
