<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gastos extends Model
{
    protected $table = "gastos";

    public $timestamps = false;

    protected $fillable = [
        "codGasto",
        "fecGasto",
        "forPago",
        "concep",
        "valor"
    ];

    public static $rules = [

    ];
}
