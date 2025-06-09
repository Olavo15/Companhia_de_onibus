<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pagamento extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'pagamentos';

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'reserva_id',
        'metodo',
        'valor',
        'pago_em',
    ];

    protected $casts = [
        'valor' => 'decimal:2',
        'pago_em' => 'datetime',
    ];

    public function reserva()
    {
        return $this->belongsTo(Reserva::class, 'reserva_id', 'id');
    }
}
