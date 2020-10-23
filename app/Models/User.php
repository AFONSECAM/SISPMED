<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','cargo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static $menu = [
        "Enfermera" => [
                ["nombre"=>"Inicio", "url"=>"/home", "icono"=>"assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-speedometer"],
                ["nombre"=>"Administrativo", "url"=>"/empresa", "icono"=>"assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-briefcase"],                                
                ["nombre"=>"Agenda", "url"=>"", "icono"=>"assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-calendar",
                    "hijos"=> [
                        ["nombre"=>"Agendar", "url"=>"/agenda", "icono"=>"assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-library-add"],
                        ["nombre"=>"Reporte", "url"=>"/agenda/informe", "icono"=>"assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-library-add"],                        
                    ]
                ],                                             
                ["nombre"=>"Inventario", "url"=>"","icono"=>"assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-3d",
                    "hijos"=> [
                        ["nombre"=>"Categorías", "url"=>"/inventario/categorias", "icono"=>"assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-library-add"],
                        ["nombre"=>"Insumos", "url"=>"/inventario/insumos", "icono"=>"assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-library-add"],                
                    ]                    
                ]             
        ]
    ];

    public static $permisos = [
        "Enfermera"=>[
            ["url" => "/home", "method"=>"GET", "identica"=>true],
            ["url"=>"/inventario/categorias", "method"=>"GET", "identica"=>true],
            ["url"=>"/inventario/categorias/view/", "method"=>"GET", "identica"=>false],
            ["url"=>"/inventario/categorias/listar", "method"=>"GET", "identica"=>true],
            ["url"=>"/inventario/categorias/crear", "method"=>"GET", "identica"=>true],
            ["url"=>"/inventario/categorias/guardar", "method"=>"POST", "identica"=>true],
            ["url"=>"/inventario/categorias/editar/", "method"=>"GET", "identica"=>false],
            ["url"=>"/inventario/categorias/actualizar", "method"=>"POST", "identica"=>true],
            ["url"=>"/inventario/insumos", "method"=>"GET", "identica"=>true],
            ["url"=>"/inventario/insumos/view/", "method"=>"GET", "identica"=>false],
            ["url"=>"/inventario/insumos/listar", "method"=>"GET", "identica"=>true],
            ["url"=>"/inventario/insumos/guardar", "method"=>"POST", "identica"=>true],
            ["url"=>"/inventario/insumos/editar/", "method"=>"GET", "identica"=>false],
            ["url"=>"/inventario/insumos/actualizar", "method"=>"POST", "identica"=>true],
        ]
    ];
    
}
