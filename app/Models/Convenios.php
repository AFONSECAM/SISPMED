<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Convenios extends Model
{
    protected $table = "convenios";

    protected $primaryKey = 'nomIPS';
    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [
        "codConv",
        "fecAper",
        "nomIPS",
        "nomConv",
        "resolu",
        "objConv",
        "durConv",
        "cosConv",
        "estado",
    ];

    public static $rules = [
        "codConv" => 'required',
        "fecAper" => 'required',
        "nomIPS" => 'required',
        "nomConv"=> 'required',
        "resolu" => 'required',
        "objConv" => 'required',
        "durConv" => 'required',
        "cosConv" => 'required',
        "estado" => 'in:1,0',
    ];
}
