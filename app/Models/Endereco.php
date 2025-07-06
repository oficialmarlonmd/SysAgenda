<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = [
        'usuario_id',
        'cep',
        'logradouro',
        'numero',
        'complemento',
        'cidade',
        'principal'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
