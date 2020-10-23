<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use Flash;
use DataTables;

use App\Models\Gastos;
use App\Exports\GastosExport;

class GastosController extends Controller
{
    public function index(){
        return view('empresa.tesoreria.gastos.index');
    }

    public function listar(Request $request){
        $gastos = Gastos::all();
        return Datatables::of($gastos)
        ->editColumn("forPago", function($gasto){
            return $gasto->forPago == "Tarjeta" ? $gasto->forPago . " Debito o Crédito" : $gasto->forPago;
        }) 
        ->editColumn("valor", function($gasto){
            return '$'. $gasto->valor;
        }) 
        ->addColumn('editar', function($gasto){
            return '<a href="/empresa/tesoreria/gastos/editar/'.$gasto->id.'" class="btn btn-xs btn-primary"><i class="fa fa-pen"></i></a>';
        }) 
        ->rawColumns(['editar'])     
        ->make(true);
    }

    public function create(){
        $ultimoGasto = Gastos::all()->last();
        return view('empresa.tesoreria.gastos.create',compact("ultimoGasto"));        
    }

    public function store(Request $request){        
        //$request->validate(Procedimientos::$rules);        
        $input = $request->all(); 
        try {
            Gastos::create([
                "codGasto" => $input["codigoGas"],
                "fecGasto" => $input["fechaGas"],
                "forPago" => $input["formaPago"],
                "concep" => $input["conceptoGas"],
                "valor" => $input["valorGas"]                
            ]);            
            Flash::success("Se ha registrado un nuevo recaudo en la base de datos");
            return redirect("/empresa/tesoreria/gastos");            
        } catch (\Exception $e) {                      
            Flash::error($e->getMessage());
            return redirect('/empresa/tesoreria/gastos/crear');
        }
    }

    public function edit($id){
        $gasto = Gastos::where('id', $id)->first();  
        $ultimoGasto = Gastos::all()->last();      
        if($gasto == null){
            Flash::error("Error al tratar de generar el formulario de edición");
            return redirect("/empresa/tesoreria/gastos");
        }
        return view("empresa.tesoreria.gastos.edit", compact("gasto","ultimoGasto"));
    }

    public function update(Request $request){
        //$request->validate(Procedimientos::$rules);                
        $input = $request->all();        
        try {
            $gasto = Gastos::where('id', $input['id']);            
            if($gasto == null){
                Flash::error("Error al tratar de actualizar");
            }            
            $gasto->update([
                "codGasto" => $input["codigoGas"],
                "fecGasto" => $input["fechaGas"],
                "forPago" => $input["formaPago"],
                "concep" => $input["conceptoGas"],
                "valor" => $input["valorGas"]              
            ]);            
            Flash::success("¡Se ha modificado con exito!");            
            return redirect("/empresa/tesoreria/gastos");
        } catch (\Exception $e) {
            Flash::error($e->getMessage());            
            return redirect("/empresa/tesoreria/gastos");
        }
    }

    public function exportar(Request $request){ 
        $input = $request->all();       
        $gastos = Gastos::all();               
        if(count($gastos) > 0){            
            if(isset($input["pdf"])){
                return $this->generar_pdf($gastos);
            }else if(isset($input["excel"])){
                return $this->generar_excel($gastos);
            }else{
                Flash::error("Error al generar el archivo! :(");
                return redirect("/empresa/tesoreria/gastos");
            }
        }else{
            Flash::info("No se encontraron registros en ese rango de fechas");
            return redirect("/empresa/tesoreria/gastos");
        }
    }

    private function generar_pdf($gastos){             
        $pdf = PDF::loadView('pdf.gastos', compact("gastos"))
        ->setPaper('a4', 'landscape');        
        return $pdf->stream('gastos.pdf');
    }


    private function generar_excel($gastos){
        $gastos = new GastosExport($gastos);
        return Excel::download($gastos, 'gastos.xlsx');
    }
}
