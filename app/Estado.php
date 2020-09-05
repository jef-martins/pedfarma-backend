<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    const RULES = [
        'descricao' => 'required',
        'uf' => 'required|min: 2|max: 2'
    ];
}
