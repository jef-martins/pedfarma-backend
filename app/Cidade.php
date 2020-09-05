<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    const RULES = [
        'descricao' => 'required|max : 100',
        'estado_id' => 'required|numeric'
    ];

    public function estado(){
        return $this->belongsTo(\App\Estado::class, 'estado_id');
    }
}
