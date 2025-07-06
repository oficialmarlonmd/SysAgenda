<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;

class Telefone extends Model
{
    protected $fillable = [
        'usuario_id',
        'numero',
        'principal'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
