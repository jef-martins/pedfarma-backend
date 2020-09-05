<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $table = 'fornecedores';

    const RULES = [
        'cnpj' => 'required|max : 20',
        'nome' => 'max :150',
        'endereco_id' => 'required|numeric'
    ];

    public function endereco(){
        return $this->belongsTo(\App\Endereco::class, 'endereco_id');
    }
}
