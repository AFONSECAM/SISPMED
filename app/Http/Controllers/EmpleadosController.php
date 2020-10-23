<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use Flash;
Use Carbon\Carbon;

use App\Exports\EmpleadosExport;
use App\Models\Empleados;
use App\Models\TiposId;
use App\Models\Sedes;
use App\Models\Convenios;
use App\Models\Cargos;


class EmpleadosController extends Controller
{
    public function index(){  
        if(Auth::user()->cargo=='Administrador') //se valida el tipo de usuario
            $empleados = Empleados::all();
        else{
            $empleados = Empleados::all()->where('estado',1);    
        }       
        
        return view("empresa.empleados.index", compact("empleados"));
    }

    public function view($id){
        $empleado = Empleados::where('id', $id)->first();
        $edad = Carbon::createFromDate($empleado->fecNac)->age; // 43
        if($empleado == null){
            Flash::error("Error al cargar la vista del empleado");
            return redirect("/empresa/empleados");
        }
        return view("empresa.empleados.view", compact("empleado", "edad"));
    }

    public function create(){        
        $tiposId = TiposId::all();
        $sedes = Sedes::all();
        $convenios = Convenios::all();
        $cargos = Cargos::all();   
        return view("empresa.empleados.create", compact("tiposId", "sedes", "convenios", "cargos"));
    }

    public function store(Request $request){
        $input = $request->all();
        try {
            Pacientes::create([
                "tipoId" => $input["tipoId"],
                "nIdEmp" => $input["numeroId"],
                "pApe" => $input["primerApe"],
                "sApe" => $input["segundoApe"],
                "pNom" => $input["primerNom"],
                "sNom" => $input["segundoNom"],
                "genero" => $input["chkGenero"],
                "fecNac" => $input["fechaNac"],
                "edad" => Carbon::createFromDate($input["fechaNac"])->age,
                "arl" => $input["arl"],
                "eps" => $input["eps"],
                "rh" => $input['rh'].$input['rhS'],
                "dirRes" => $input['direccion'],
                "ciuRes" => $input['ciudad'],                
                "telEmp" => $input['telefono'],
                "emailEmp" => $input['email'],
                "eCivil" => $input['estadoCivil'],
                "nivlEdu" => $input['nivelEdu'],
                "fecIng" => $input['fechaIng'],
                "nomCar" => $input['cargo'],
                "nomSede" => $input['sede'],
                "estado" => $input['estado']
            ]);
            Flash::success("Se ha registrado un nuevo empleado en la base de datos");
            return redirect("/empresa/empleados");  
        } catch (\Exception $e) {
            Flash::error($e->getMessage());
            return redirect('/empresa/empleados');
        }
    }

    public function edit($id){
        $empleado = Empleados::where('id', $id)->first();
        $tiposId = TiposId::all();
        $convenios = Convenios::all();
        $sedes = Sedes::all();
        $cargos = Cargos::all();        
        if($empleado == null){
            Flash::error("Error al cargar la información para editarla");
            return redirect("/empresa/empleados");
        }
        return view("empresa.empleados.edit", compact("empleado", "tiposId", "convenios", "sedes", "cargos"));
    }

    public function update(Request $request){
        $input = $request->all();
        try {
            $empleado = Empleados::where('id',$input['id']);
            if($empleado == null){
                Flash::error("Se ha producido un error al generar la vista para actualizar");
                return \redirect("/empresa/empleados");
            }
            $empleado->update([
                "tipoId" => $input["tipoId"],
                "nIdEmp" => $input["numeroId"],
                "pApe" => $input["primerApe"],
                "sApe" => $input["segundoApe"],
                "pNom" => $input["primerNom"],
                "sNom" => $input["segundoNom"],
                "genero" => $input["chkGenero"],
                "fecNac" => $input["fechaNac"],
                "edad" => Carbon::createFromDate($input["fechaNac"])->age,
                "arl" => $input["arl"],
                "eps" => $input["eps"],
                "rh" => $input['rh'].$input['rhS'],
                "dirRes" => $input['direccion'],
                "ciuRes" => $input['ciudad'],                
                "telEmp" => $input['telefono'],
                "emailEmp" => $input['email'],
                "eCivil" => $input['estadoCivil'],
                "nivlEdu" => $input['nivelEdu'],
                "fecIng" => $input['fechaIng'],
                "nomCar" => $input['cargo'],
                "nomSede" => $input['sede'],
                "estado" => $input['estado']
            ]);
            Flash::success("Se ha modificado el empleado con éxito");
            return redirect("/empresa/empleados");
        } catch (\Exception $e) {
            Flash::error($e->getMessage());
            return redirect("/empresa/empleados");
        }
    }
    
    public function updateState($id, $estado){
        $empleado = Empleados::where('id', $id)->first();
        if($empleado == null){
            Flash::error("Ups! Se ha generado un error al cambiar el estado...");
            return redirect("/empresa/empleados");
        }
    
        try {
            $empleado->update(["estado"=>$estado]);
            Flash::info("Se modificó el estado del empleado " . $empleado->pNom . " " . $empleado->sNom . " " . $empleado->pApe . " " . $paciente->sApe . " su estado pasó a ser: " . $empleado->estado);
            return redirect("/empresa/empleados");                   
        } catch (Exception $e) {
            Flash::error($e->getMessage());
            return redirect("/empresa/empleados");
        }        
    }

    public function exportar(Request $request){ 
        $input = $request->all();       
        $empleados = Empleados::all();               
        if(count($empleados) > 0){            
            if(isset($input["pdf"])){
                return $this->generar_pdf($empleados);
            }else if(isset($input["excel"])){
                return $this->generar_excel($empleados);
            }else{
                Flash::error("Error al generar el archivo! :(");
                return redirect("/empresa/empleados");
            }
        }else{
            Flash::info("No se encontraron registros en ese rango de fechas");
            return redirect("/empresa/empleados");
        }
    }

    private function generar_pdf($empleados){             
        $pdf = PDF::loadView('pdf.empleados', compact("empleados"))
        ->setPaper('a4', 'landscape');        
        return $pdf->stream('empleados.pdf');
    }


    private function generar_excel($empleados){
        $empleados = new EmpleadosExport($empleados);
        return Excel::download($empleados, 'empleados.xlsx');
    }
}
