<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'available',
        'rate',
        'author_id',
        'estoque',
        'image',
        'price',
    ];

    public function itensVenda()
    {
        return $this->hasMany(ItensVenda::class);
    }
}
