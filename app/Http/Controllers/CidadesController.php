<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Cidade;

class CidadesController extends Controller
{
    public function add(Request $request){

        try{

            $validator = Validator::make($request->all(), Cidade::RULES);

            if($validator->fails()){

                return response($validator->errors(),422);
            }
         
            $cidade = new Cidade();

            $cidade->descricao = $request->descricao;
            $cidade->estado_id = $request->estado_id;

            $cidade->save();

            return response($request);

        }catch(Exception $erro){
            return  response(['Status'=>'erro', 'details'=>$erro]);
        }
    }

    public function list(){
        $cidade = Cidade::all();

        if(!empty($cidade))
            return response($cidade);
        
        return response(['retorno'=>'Lista vazia']);
    }

    public function select ($id){
        $cidade = Cidade::find($id);

        if(!empty($cidade))
            return response($cidade);
        
        return response(['retorno'=>'id não encontrado']);
    }

    public function update(Request $request, $id){

        try{

            $validator = Validator::make($request->all(), Cidade::RULES);

            if($validator->fails()){

                return response($validator->errors(),422);
            }

            $cidade = Cidade::find($id);

            if(!empty($cidade)){
                $cidade->descricao = $request->descricao;
                $cidade->estado_id = $request->estado_id;
            }
            else
                return response(['retorno'=>'id não encontrado']);

            $cidade->save();
            return response($request);

        }catch(Exception $erro){
            return  response(['Status'=>'erro', 'details'=>$erro]);
        }
    }

    public function  delete($id){
        try{

            $cidade = Cidade::find($id);

            if(!empty($cidade))
                $cidade->delete();
            else
                return response(['retorno'=>'id não encontrado']);

            return response($cidade);

        }catch(Exception $erro){
            return  response(['Status'=>'erro', 'details'=>$erro]);
        }
    }
}
