<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'endereco',
        'num_de_quarto',
        'classificacao',
        'cafe_da_manha',
        'user_id'
    ];
}
