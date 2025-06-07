<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Onibus extends Model
{
    use HasFactory, HasUuids;
    protected $table = "onibus";
    
    protected $fillable = [
        'numero',
        'max_assento',
    ];
    public $timestamps = true;

     /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'numero' => 'string',
            'max_assento' => 'integer',
        ];
    }
}
