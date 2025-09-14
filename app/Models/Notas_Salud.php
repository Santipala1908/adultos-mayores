<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notas_Salud extends Model
{
    use HasFactory;

    protected $fillable = [
        'senior_id',
        'registrado_por',
        'observacion',
        'fecha_nota',
    ];

    public function senior()
    {
        return $this->belongsTo(Senior::class);
    }

    // Relación con el usuario que registró la nota
    public function registradoPor()
    {
        return $this->belongsTo(User::class, 'registrado_por');
    }
}