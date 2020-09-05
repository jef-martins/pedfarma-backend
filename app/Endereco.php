<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    const RULES = [
        'logradouro' => 'required|max : 150',
        'complemento' => 'nullable|max :150',
        'cep' => 'min: 8|max: 8',
        'bairro_id' => 'required|numeric'
    ];

    public function bairro(){
        return $this->belongsTo(\App\Bairro::class, 'bairro_id');
    }
}
