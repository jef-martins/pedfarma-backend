<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Bairro;

class BairrosController extends Controller
{
    public function add(Request $request){

        try{

            $validator = Validator::make($request->all(), Bairro::RULES);

            if($validator->fails()){

                return response($validator->errors(),422);
            }
         
            $bairro = new Bairro();

            $bairro->descricao = $request->descricao;
            $bairro->cidade_id = $request->cidade_id;

            $bairro->save();

            return response($request);

        }catch(Exception $erro){
            return  response(['Status'=>'erro', 'details'=>$erro]);
        }
    }

    public function list(){
        $bairro = Bairro::all();

        if(!empty($bairro))
            return response($bairro);
        
        return response(['retorno'=>'Lista vazia']);
    }

    public function select ($id){
        $bairro = Bairro::find($id);

        if(!empty($bairro))
            return response($bairro);
        
        return response(['retorno'=>'id não encontrado']);
    }

    public function update(Request $request, $id){

        try{

            $validator = Validator::make($request->all(), Bairro::RULES);

            if($validator->fails()){

                return response($validator->errors(),422);
            }

            $bairro = Bairro::find($id);

            if(!empty($bairro)){
                $bairro->descricao = $request->descricao;
                $bairro->cidade_id = $request->cidade_id;
            }
            else
                return response(['retorno'=>'id não encontrado']);

            $bairro->save();
            return response($request);

        }catch(Exception $erro){
            return  response(['Status'=>'erro', 'details'=>$erro]);
        }
    }

    public function  delete($id){
        try{

            $bairro = Bairro::find($id);

            if(!empty($bairro))
                $bairro->delete();
            else
                return response(['retorno'=>'id não encontrado']);

            return response($bairro);

        }catch(Exception $erro){
            return  response(['Status'=>'erro', 'details'=>$erro]);
        }
    }
}
