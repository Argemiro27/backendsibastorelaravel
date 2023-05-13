<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendas extends Model
{
    use HasFactory;

    protected $fillable = ['usuario_id', 'forma_pagamento', 'status'];

    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'usuario_id');
    }

    public function itensVenda()
    {
        return $this->hasMany(ItensVenda::class, 'venda_id');
    }

    public function parcelas()
    {
        return $this->hasMany(Parcelas::class, 'venda_id')
        ->select(['id', 'venda_id', 'valor', 'datavencimento', 'numParcelas']);
    }
}
