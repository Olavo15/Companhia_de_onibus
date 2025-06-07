<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Passageiros extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'passageiros';

    protected $fillable = [
        'nome',
        'idade',
        'cpf',
    ];

    public $timestamps = true;

    protected $casts = [
        'nome' => 'string',
        'idade' => 'integer',
        'cpf' => 'string',
    ];
}
