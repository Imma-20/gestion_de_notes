<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnitesEnseignement extends Model
{
    protected $table = 'unites_enseignement';
    protected $fillable = [
        'code',
        'nom',
        'credits_ects',
        'semestre'

    ];
}
