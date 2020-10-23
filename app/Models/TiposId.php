<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TiposId extends Model
{
    protected $table = 'tipos_id';

    public $timestamps = false;
    
    
    public $fillable = [
        'tipoId',
        'nomTipo',        
    ];

    public static $rules = [
        'tipoId' => 'required|min:2',
        'nomTipo' => 'required'
    ];

}
