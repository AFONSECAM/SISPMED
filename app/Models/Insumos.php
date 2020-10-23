<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insumos extends Model
{
    protected $table = "insumos";

    public $timestamps = false;

    protected $fillable= [
        "codIns",
        "nomIns",
        "labora",
        "concen",
        "pres",
        "unid",
        "precioU",
        "fecVen",
        "nomCate"
    ];
}
