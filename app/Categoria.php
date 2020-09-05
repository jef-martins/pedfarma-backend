<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    const RULES = [
        'descricao' => 'required|max : 150'
    ];
}
