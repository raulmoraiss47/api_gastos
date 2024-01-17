<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcela extends Model
{
    use HasFactory;

    protected $fillable = [
        'divida_id',
        'valor',
        'data_vencimento',
    ];

    public function divida()
    {
        return $this->belongsTo(Divida::class, 'divida_id');
    }
}
