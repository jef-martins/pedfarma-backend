<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Estado;

class EstadosController extends Controller
{
    public function teste(){
        return response(['status'=> 'ok']);
    }

    public function add(Request $request){

        try{

            //$request->validate(Cidade::RULES);

            $validator = Validator::make($request->all(), Estado::RULES);

            if($validator->fails()){

                return response($validator->errors(),422);
            }

            $estado = new Estado();

            $estado->descricao = $request->descricao;
            $estado->uf = $request->uf;

            $estado->save();

            return response($request);

        }catch(Exception $erro){
            return  response(['Status'=>'erro', 'details'=>$erro]);
        }
    }

    public function list(){
        $estado = Estado::all();

        if(!empty($estado))
            return response($estado);
        
        return response(['retorno'=>'Lista vazia']);
    }

    public function select ($id){
        $estado = Estado::find($id);

        if(!empty($estado))
            return response($estado);
        
        return response(['retorno'=>'id não encontrado'],204);
    }

    public function update(Request $request, $id){

        try{

            $validator = Validator::make($request->all(), Estado::RULES);

            if($validator->fails()){

                return response($validator->errors(),422);
            }

            $estado = Estado::find($id);

            if(!empty($estado)){
                $estado->descricao = $request->descricao;
                $estado->uf = $request->uf;
            }
            else
                return response(['retorno'=>'id não encontrado']);

            $estado->save(); 
            return response($request);

        }catch(Exception $erro){
            return  response(['Status'=>'erro', 'details'=>$erro]);
        }
    }

    public function delete($id){
        try{

            $estado = Estado::find($id);

            if(!empty($estado))
                $estado->delete();
            else
                return response(['retorno'=>'id não encontrado']);

            return response($estado);

        }catch(Exception $erro){
            return  response(['Status'=>'erro', 'details'=>$erro]);
        }
    }
    
}
