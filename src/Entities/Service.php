<?php

namespace GdaDesenv\AdminService\Entities;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'icone',
        'nome',
        'descricao',
    ];
}
