<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bairro extends Model
{
    const RULES = [
        'descricao' => 'required|max : 100',
        'cidade_id' => 'required|numeric'
    ];

    public function cidade(){
        return $this->belongsTo(\App\Cidade::class, 'cidade_id');
    }
    
}
