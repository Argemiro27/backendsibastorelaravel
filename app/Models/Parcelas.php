<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcelas extends Model
{
    use HasFactory;

    protected $fillable = ['venda_id', 'datavencimento', 'valor', 'numParcelas'];

    public function venda()
    {
        return $this->belongsTo(Vendas::class, 'venda_id');
    }
}
