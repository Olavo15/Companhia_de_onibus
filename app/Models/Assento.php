<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Assento extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'assento';

    protected $fillable = [
        'n_assento',
        'disponivel',
        'onibus_id',
    ];

    public $timestamps = true;

    protected $casts = [
        'n_assento' => 'string',
        'disponivel' => 'boolean',
        'onibus_id' => 'string',
    ];

    /**
     * Relacionamento: um assento pertence a um ônibus
     */
    public function onibus()
    {
        return $this->belongsTo(Onibus::class);
    }
}
