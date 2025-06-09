<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Viagem extends Model
{
    use SoftDeletes;

    protected $table = 'viagens';

    protected $fillable = [
        'onibus_id',
        'motorista_id',  // caso já tenha adicionado esse campo na migration
        'origem',
        'destino',
        'partida_dt',
        'chegada_dt',
        'valor',
    ];

    protected $dates = [
        'partida_dt',
        'chegada_dt',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // Relacionamento com Onibus
    public function onibus()
    {
        return $this->belongsTo(Onibus::class);
    }

    // Relacionamento com Motorista (se adicionou essa relação)
    public function motorista()
    {
        return $this->belongsTo(Motorista::class);
    }

    // Relacionamento com Reservas
    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
