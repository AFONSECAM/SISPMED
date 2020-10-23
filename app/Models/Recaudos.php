<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recaudos extends Model
{
    protected $table = "recaudos";

    public $timestamps = false;

    protected $fillable = [
        "codReca",
        "fecReca",
        "concep",
        "valor"
    ];

    public static $rules = [

    ];
}
