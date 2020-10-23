<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use Flash;

use App\Models\Pacientes;
use App\Models\Sedes;
use App\Models\Convenios;
use App\Models\TiposId;
use App\Exports\PacientesExport;

class PacientesController extends Controller
{
    public function index(){
        if(Auth::user()->cargo == "Administrador"){
            $pacientes = Pacientes::all();
        }else{
            $pacientes = Pacientes::all()->where('estado', "Activo");
        }        
        return view("empresa.pacientes.index", compact("pacientes"));
    }

    public function view($id){
        $paciente = Pacientes::where('id', $id)->first();        
        if($paciente == null){
            Flash::error("Error al tratar de generar al cargar la información");
            return redirect("/empresa/pacientes");
        }
        return view("empresa.pacientes.view", compact("paciente"));
    }

    public function create() {
        $sedes = Sedes::all();        
        $convenios = Convenios::all();        
        $tiposId = TiposId::all();        
        return view("empresa.pacientes.create", compact("sedes","convenios","tiposId"));
    }

    public function store(Request $request){
        $input = $request->all();
        try {
            Pacientes::create([
                "tipoId" => $input["tipoId"],
                "nIdPac" => $input["numeroId"],
                "pApe" => $input["primerApe"],
                "sApe" => $input["segundoApe"],
                "pNom" => $input["primerNom"],
                "sNom" => $input["segundoNom"],
                "genero" => $input["chkGenero"],
                "fNaci" => $input["fechaNac"],
                "edad" => $input["edad"],
                "regimen" => $input["regimen"],
                "rh" => $input['rh'],
                "ciudad" => $input['ciudad'],
                "dirResi" => $input['direccion'],
                "telPac" => $input['telefono'],
                "emailPac" => $input['email'],
                "eCivil" => $input['estadoCivil'],
                "nomSede" => $input['sede'],
                "nomIPS" => $input['ips'],
                "estado" => $input['estado']
            ]);
            Flash::success("Se ha registrado un nuevo paciente en la base de datos");
            return redirect("/empresa/pacientes");  
        } catch (\Exception $e) {
            Flash::error($e->getMessage());
            return redirect('/empresa/pacientes');
        }
    }

    public function edit($id){
        $paciente = Pacientes::where('id', $id)->first();
        $tiposId = TiposId::all();
        $convenios = Convenios::all();
        $sedes = Sedes::all();        
        if($paciente == null){
            Flash::error("Error al cargar la información para editarla");
            return redirect("/empresa/pacientes");
        }
        return view("empresa.pacientes.edit", compact("paciente", "tiposId", "convenios", "sedes"));
    }

    public function update(Request $request){
        $input = $request->all();
        try {
            $paciente = Pacientes::where('id', $input['id']);
            if($paciente == null){
                Flash::error("Se ha producido un error al generar la vista");
                return redirect("/empresa/pacientes");
            }
            $paciente->update([
                "tipoId" => $input["tipoId"],
                "nIdPac" => $input["numeroId"],
                "pApe" => $input["primerApe"],
                "sApe" => $input["segundoApe"],
                "pNom" => $input["primerNom"],
                "sNom" => $input["segundoNom"],
                "genero" => $input["genero"],
                "fNaci" => $input["fechaNac"],
                "edad" => $input["edad"],
                "regimen" => $input["regimen"],
                "rh" => $input['rh'],
                "ciudad" => $input['ciudad'],
                "dirResi" => $input['direccion'],
                "telPac" => $input['telefono'],
                "emailPac" => $input['email'],
                "eCivil" => $input['estadoCivil'],
                "nomSede" => $input['sede'],
                "nomIPS" => $input['ips'],
                "estado" => $input['estado']
            ]);
            Flash::success("Se ha modificado el paciente " . $input["primerNom"] . " " . $input["segundoNom"] . " " . $input["primerApe"] . " " . $input["segundoApe"] . " con éxito");
            return redirect("/empresa/pacientes");
        } catch (\Exception $e) {
            Flash::error($e->getMessage());
            return redirect("/empresa/pacientes");
        }    
    }

    public function updateState($id, $estado){
        $paciente = Pacientes::where('id', $id)->first();
        if($paciente == null){
            Flash::error("Ups! Se ha generado un error al cambiar el estado...");
            return redirect("/empresa/pacientes");
        }

        try {
            $paciente->update(["estado"=>$estado]);
            Flash::info("Se modificó el estado del paciente " . $paciente->pNom . " " . $paciente->sNom . " " . $paciente->pApe . " " . $paciente->sApe . " su estado pasó a ser: " . $paciente->estado);
            return redirect("/pacientes");                   
        } catch (Exception $e) {
            Flash::error($e->getMessage());
            return redirect("/empresa/pacientes");
        }        
    }

    public function exportar(Request $request){ 
        $input = $request->all();       
        $pacientes = Pacientes::all();               
        if(count($pacientes) > 0){            
            if(isset($input["pdf"])){
                return $this->generar_pdf($pacientes);
            }else if(isset($input["excel"])){
                return $this->generar_excel($pacientes);
            }else{
                Flash::error("Error al generar el archivo! :(");
                return redirect("/empresa/pacientes");
            }
        }else{
            Flash::info("No se encontraron registros en ese rango de fechas");
            return redirect("/empresa/pacientes");
        }
    }

    private function generar_pdf($pacientes){             
        $pdf = PDF::loadView('pdf.pacientes', compact("pacientes"))
        ->setPaper('a4', 'landscape');        
        return $pdf->stream('pacientes.pdf');
    }


    private function generar_excel($pacientes){
        $pacientes = new PacientesExport($pacientes);
        return Excel::download($pacientes, 'pacientes.xlsx');
    }
}
