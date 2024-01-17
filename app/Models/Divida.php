<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divida extends Model
{
    use HasFactory;

    protected $table = 'dividas';

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'value',
        'date_compra',
        'a_vista',
        'parcelado',
        'qtd_parcelas',
    ];

    public function parcelas()
    {
        return $this->hasMany(Parcela::class);
    }
}
