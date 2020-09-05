<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    const RULES = [
        'cliente_id' => 'required|numeric'
    ];

    public function cliente(){
        return $this->belongsTo(\App\Cliente::class, 'cliente_id');
    }

}
