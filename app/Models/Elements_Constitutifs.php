<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Elements_Constitutifs extends Model
{
    use HasFactory;
    
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
