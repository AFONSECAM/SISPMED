<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acompanantes extends Model
{
    protected $table = "acompanantes";

    public $timestamps = false;

    protected $fillable = [
        "tipoId", 
        "nIdAcom",       
        "nIdPac",
        "pApe",
        "sApe",
        "pNom",
        "sNom",                
        "edad",                            
        "telAcom",
        "mailAcom",
        "parPac",                        
    ];
}
