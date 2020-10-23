<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    protected $table = "empleados";

    public $timestamps = false;

    protected $fillable = [
        "tipoId",
        "nIdEmp",
        "pApe",
        "sApe",
        "pNom",
        "sNom",
        "genero",
        "fecNac",
        "edad",
        "arl",
        "eps",
        "rh",        
        "dirResi",
        "ciuRes",
        "telEmp",
        "emailEmp",
        "eCivil",
        "nivelEdu", 
        "fecIng",       
        "nomSede",
        "nomCar",
        "estado"
    ];

    public static $rules = [

    ];
}
