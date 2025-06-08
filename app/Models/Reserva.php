<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($reserva) {
            $reserva->codigo_verificacao = strtoupper(Str::random(10));
        });
    }
}
