<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    protected $table = "pacientes";

    public $timestamps = false;

    protected $fillable = [
        "tipoId",
        "nIdPac",
        "pApe",
        "sApe",
        "pNom",
        "sNom",
        "genero",
        "fNaci",
        "edad",
        "regimen",
        "rh",
        "ciudad",
        "dirResi",
        "telPac",
        "emailPac",
        "eCivil",
        "nomSede",
        "nomIPS",
        "estado"
    ];

    public static $rules = [

    ];

    public function sede(){
        return $this->belongsTo(Sedes::class);
    }
}
