<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Endereco;

class EnderecosController extends Controller
{
    public function add(Request $request){

        try{

            $validator = Validator::make($request->all(), Endereco::RULES);

            if($validator->fails()){

                return response($validator->errors(),422);
            }
         
            $endereco = new Endereco();

            $endereco->logradouro = $request->logradouro;
            $endereco->complemento = $request->complemento;
            $endereco->cep = $request->cep;
            $endereco->bairro_id = $request->bairro_id;

            $endereco->save();

            return response($request);

        }catch(Exception $erro){
            return  response(['Status'=>'erro', 'details'=>$erro]);
        }
    }

    public function list(){
        $endereco = Endereco::all();

        if(!empty($endereco))
            return response($endereco);
        
        return response(['retorno'=>'Lista vazia']);
    }

    public function select ($id){
        $endereco = Endereco::find($id);

        if(!empty($endereco))
            return response($endereco);
        
        return response(['retorno'=>'id não encontrado']);
    }

    public function update(Request $request, $id){

        try{

            $validator = Validator::make($request->all(), Endereco::RULES);

            if($validator->fails()){

                return response($validator->errors(),422);
            }

            $endereco = Endereco::find($id);

            if(!empty($endereco)){
                $endereco->logradouro = $request->logradouro;
                $endereco->complemento = $request->complemento;
                $endereco->cep = $request->cep;
                $endereco->bairro_id = $request->bairro_id;
            }
            else
                return response(['retorno'=>'id não encontrado']);

            $endereco->save();
            return response($request);

        }catch(Exception $erro){
            return  response(['Status'=>'erro', 'details'=>$erro]);
        }
    }

    public function  delete($id){
        try{

            $endereco = Endereco::find($id);

            if(!empty($endereco))
                $endereco->delete();
            else
                return response(['retorno'=>'id não encontrado']);

            return response($endereco);

        }catch(Exception $erro){
            return  response(['Status'=>'erro', 'details'=>$erro]);
        }
    }
}
