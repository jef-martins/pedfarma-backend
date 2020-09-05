<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda_item extends Model
{
    protected $table = 'venda_itens';

    const RULES = [
        'venda_id' => 'required|numeric',
        'produto_id' => 'required|numeric',
    ];

    public function venda(){
        return $this->belongsTo(\App\Venda::class, 'venda_id');
    }

    public function produto(){
        return $this->belongsTo(\App\Produto::class, 'produto_id');
    }
}
