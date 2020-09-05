<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Fabricante;

class FabricantesController extends Controller
{
    public function add(Request $request){

        try{

            $validator = Validator::make($request->all(), Fabricante::RULES);

            if($validator->fails()){

                return response($validator->errors(),422);
            }
         
            $fabricante = new Fabricante();

            $fabricante->nome = $request->nome;

            $fabricante->save();

            return response($request);

        }catch(Exception $erro){
            return  response(['Status'=>'erro', 'details'=>$erro]);
        }
    }

    public function list(){
        $fabricante = Fabricante::all();

        if(!empty($fabricante))
            return response($fabricante);
        
        return response(['retorno'=>'Lista vazia']);
    }

    public function select ($id){
        $fabricante = Fabricante::find($id);

        if(!empty($fabricante))
            return response($fabricante);
        
        return response(['retorno'=>'id não encontrado']);
    }

    public function update(Request $request, $id){

        try{

            $validator = Validator::make($request->all(), Fabricante::RULES);

            if($validator->fails()){

                return response($validator->errors(),422);
            }

            $fabricante = Fabricante::find($id);

            if(!empty($fabricante)){
                $fabricante->nome = $request->nome;
            }
            else
                return response(['retorno'=>'id não encontrado']);

            $fabricante->save();
            return response($request);

        }catch(Exception $erro){
            return  response(['Status'=>'erro', 'details'=>$erro]);
        }
    }

    public function  delete($id){
        try{

            $fabricante = Fabricante::find($id);

            if(!empty($fabricante))
                $fabricante->delete();
            else
                return response(['retorno'=>'id não encontrado']);

            return response($fabricante);

        }catch(Exception $erro){
            return  response(['Status'=>'erro', 'details'=>$erro]);
        }
    }
}
