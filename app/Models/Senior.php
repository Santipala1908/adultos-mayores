<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Senior extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nombre',
        'edad',
        'direccion',
        'telefono',
        'estado_salud',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //un usuario tiene muchos recordatorios
    public function recordatorios()
    {   
        return $this->hasMany(Recordatorio::class);
    }

    //un usuario tiene muchas notas de salud
    public function notasSalud()
    {
        return $this->hasMany(Notas_Salud::class);  
    }

    //un usuario tiene muchas conversaciones
    public function conversaciones()
    {
        return $this->hasMany(Conversacion::class); 
    }
}