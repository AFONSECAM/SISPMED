<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use DataTables;

use App\Models\Acompanantes;
use App\Models\TiposId;

class AcompanantesController extends Controller
{
    public function index($nid){
        $nidP = $nid;               
        return view("pacientes.acompanantes.index", compact("nidP"));        
    }

    public function listar($nid){
        $acompanantes = Acompanantes::where('nIdPac', $nid);        
        
        return Datatables::of($acompanantes)
        ->editColumn("nombre", function($acompanante){
            return $acompanante->pNom . " " . $acompanante->pNom;
        })
        ->editColumn("apellidos", function($acompanante){
            return $acompanante->pApe . " " . $acompanante->sApe;
        })
        ->editColumn("edad", function($acompanante){
            return $acompanante->edad . " años";
        })
        ->addColumn("editar", function ($acompanante) {
            return '<a href="/pacientes/acompanantes/editar/'.$acompanante->id.'" class="btn btn-xs btn-primary"><i class="fas fa-pen"></i></a>';
        })
        ->rawColumns(['editar', 'nombre', 'apellidos', 'edad'])
        ->make(true);            
    }

    public function create($nid){
        $pacienteNid = $nid;
        $tiposId = TiposId::all(); 
        return view("pacientes.acompanantes.create", \compact("pacienteNid", "tiposId"));
    }

    public function store(Request $request){
        $input = $request->all();
        try {
            Acompanantes::create([
                "tipoId" => $input["tipoId"],
                "nIdAcom" => $input["numeroId"],
                "pApe" => $input["primerApe"],
                "sApe" => $input["segundoApe"],
                "pNom" => $input["primerNom"],
                "sNom" => $input["segundoNom"],
                "edad" => $input["edad"],
                "telAcom" => $input['telefono'],
                "mailAcom" => $input['email'],
                "parPac" => $input['parentesco'],
                "nIdPac" => $input['paciente']                
            ]);
            Flash::success("Se ha registrado un nuevo acompañante");
            return redirect('/pacientes/acompanantes/' . $input['paciente']);
        } catch (\Exception $e) {
            Flash::error($e->getMessage());
            return redirect('/pacientes/acompanantes/' . $input['paciente']);
        }
    }
    
    public function edit($id){
        $tiposId = TiposId::all();         
        $acompanante = Acompanantes::where('id', $id)->first();        
        if($acompanante == null){
            Flash::error("Error al cargar la información para editarla");
            return redirect("/acompanantes");
        }
        return view("pacientes.acompanantes.edit", \compact("acompanante","tiposId"));
    }

    public function update(Request $request){
        $input = $request->all();
        $acompanante = Acompanantes::where('id', $input["id"]);
        try {        
            if($acompanante == null){
                Flash::error("Se ha producido un error al generar la vista");
                return redirect("/pacientes");
            }
            $acompanante->update([
                "tipoId" => $input["tipoId"],
                "nIdAcom" => $input["numeroId"],
                "pApe" => $input["primerApe"],
                "sApe" => $input["segundoApe"],
                "pNom" => $input["primerNom"],
                "sNom" => $input["segundoNom"],
                "edad" => $input["edad"],
                "telAcom" => $input['telefono'],
                "mailAcom" => $input['email'],
                "parPac" => $input['parentesco'],                                
            ]);
            Flash::success("Se ha modificado el acompañante " . $input["primerNom"] . " " . $input["segundoNom"] . " " . $input["primerApe"] . " " . $input["segundoApe"] . " con éxito");
            return redirect("/pacientes");
        } catch (\Exception $e) {
            Flash::error($e->getMessage());
            return redirect("/pacientes");
        }
    }
}
