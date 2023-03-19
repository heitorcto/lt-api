<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'telefones';

    protected $fillable = [
        'telefone',
        'id_desenvolvedor'
    ];
}
