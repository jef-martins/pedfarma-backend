<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    const RULES = [
        'modelo' => 'required|max : 150',
        'descricao' => 'required|max :150',
        'preco' => 'numeric',
        'categoria_id' => 'required|numeric',
        'fabricante_id' => 'required|numeric'
    ];

    public function categoria(){
        return $this->belongsTo(\App\Categoria::class, 'categoria_id');
    }

    public function fabricante(){
        return $this->belongsTo(\App\Fabricante::class, 'fabricante_id');
    }
}
