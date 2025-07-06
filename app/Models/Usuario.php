<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Endereco;
use App\Models\Telefone; // Certifique-se de que Telefone também está sendo usado se precisar

class Usuario extends Model
{
    protected $fillable = ['name', 'sexo', 'data_nascimento'];

    // Adiciona 'idade' para ser automaticamente incluído quando o modelo é serializado
    protected $appends = ['idade'];

    public function getIdadeAttribute()
    {
        return Carbon::parse($this->data_nascimento)->age; //
    }

    public function enderecos()
    {
        return $this->hasMany(Endereco::class);
    }

    public function telefones() // Se você tiver este relacionamento, adicione
    {
        return $this->hasMany(Telefone::class);
    }
}