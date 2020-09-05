<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    const RULES = [
        'cpf' => 'required|max : 20',
        'nome' => 'max :150',
        'email' => 'email|max :150',
        'endereco_id' => 'required|numeric'
    ];

    public function endereco(){
        return $this->belongsTo(\App\Endereco::class, 'endereco_id');
    }
}
