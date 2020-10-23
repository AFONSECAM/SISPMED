<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Procedimientos extends Model
{
    protected $table = "procedimientos";

    public $timestamps = false;

    protected $fillable = [
        "codProc",
        "nomProc",
        "conProc",
        "valProc",
        "estado"
    ];

    public static $rules = [
        "codProc" => 'required'
    ];
}
