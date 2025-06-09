<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Motorista extends Model
{
    use SoftDeletes;

    protected $table = 'motoristas';

    protected $keyType = 'string'; 

    public $incrementing = true;

    protected $fillable = [
        'id',
        'nome',
        'cpf',
        'telefone',
    ];

    public function onibus()
    {
        return $this->hasMany(Onibus::class, 'motorista_id', 'id');
    }
}
