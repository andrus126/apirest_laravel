<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Laboratorista;

class LaboratoristaController extends Controller
{
    public function createLaboratorista( Request $request){
        $request->validate([
            'nombre' => "required",
            'ci' => "required",
            'especialidad' => "required"
        ]);

        $user_id = auth()->user()->id;

        $laboratorista = new Laboratorista();
        $laboratorista->user_id = $user_id;
        $laboratorista->nombre = $request->nombre;
        $laboratorista->ci = $request->ci;
        $laboratorista->especialidad = $request->especialidad;

        $laboratorista->save();
        
        return response([
            "status" => 1,
            "msg" => "¡Laboratorista registrado!",
        ]);

    }
    public function listLaboratorista(){
        $user_id = auth()->user()->id;
        $laboratoristas = Laboratorista::where("user_id", $user_id)->get();

        return response([
            "status" => 1,
            "msg" => "¡Listado de Laboratoristas!",
            "data" => $laboratoristas
        ]);
    }
    public function showLaboratorista($id){
        
    }
    public function updateLaboratorista(Request $request, $id){
        $user_id = auth()->user()->id;
        if ( Laboratorista::where(["user_id"=>$user_id, "id"=>$id])->exists()){
            
            $laboratorista = Laboratorista::find($id);


            $laboratorista->nombre = isset($request->nombre) ? $request->nombre : $laboratorista->nombre;
            $laboratorista->ci =isset($request->ci) ? $request->ci : $laboratorista->ci ;
            $laboratorista->especialidad = isset($request->especialidad) ? $request->especialidad : $laboratorista->especialidad;
            
            $laboratorista->save();

            return response([
                "status" => 1,
                "msg" => "¡Laboratorista actualizado!",  
            ]);

        }else{
            return response([
                "status" => 0,
                "msg" => "¡no se encontro el laboratorista!",  
            ], 404);
        }
        
    }
    public function deleteLaboratorista($id){
        $user_id = auth()->user()->id;
        
        if ( Laboratorista::where(["id"=>$id,"user_id"=>$user_id])->exists()){
            $laboratorista = Laboratorista::where(["id"=>$id,"user_id"=>$user_id])->first();
            $laboratorista->delete();

            return response([
                "status" => 1,
                "msg" => "¡Laboratorista eliminado!",  
            ]);
        }else{
            return response([
                "status" => 0,
                "msg" => "¡Laboratorista no eliminado!",  
            ]);

        }
    }
}
