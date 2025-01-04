<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Elements_Constitutifs extends Model
{
    
    protected $table = 'elements_constitutifs';
    protected $fillable = [
        'code',
        'nom',
        'coefficient',
        'ue_id'
    ];

    public function uniteEnseignement()
    {
        return $this->belongsTo(UnitesEnseignement::class, 'ue_id', 'id');
    }
}
