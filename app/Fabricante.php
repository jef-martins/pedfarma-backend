<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fabricante extends Model
{
    const RULES = [
        'nome' => 'required|max : 150'
    ];
}
