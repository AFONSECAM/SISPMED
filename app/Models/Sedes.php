<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Sedes extends Model
{
    protected $table = 'sedes';

    protected $fillable = [        
        "nomSede",
        "dirSede",
        "telSede",
        "estado",
    ];

    public static $rules = [
        'nomSede' => 'required',
        'dirSede' => 'required',
        'telSede' => 'required',
        'estado' => 'in:1,0',
    ];

    public function pacientes(){
        return $this->hasMany(Pacientes::class);
    }

    public function empleados(){
        return $this->hasMany(Empleados::class);
    }
}
