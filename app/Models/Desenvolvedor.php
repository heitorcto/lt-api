<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desenvolvedor extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'desenvolvedores';

    protected $fillable = [
        'nome',
        'nivel'
    ];
}
