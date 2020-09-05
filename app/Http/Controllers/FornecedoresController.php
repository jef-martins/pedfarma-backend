<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Fornecedor;

class FornecedoresController extends Controller
{
    public function add(Request $request){

        try{

            $validator = Validator::make($request->all(), Fornecedor::RULES);

            if($validator->fails()){

                return response($validator->errors(),422);
            }
         
            $fornecedor = new Fornecedor();

            $fornecedor->cnpj = $request->cnpj;
            $fornecedor->nome = $request->nome;
            $fornecedor->endereco_id = $request->endereco_id;

            $fornecedor->save();

            return response($request);

        }catch(Exception $erro){
            return  response(['Status'=>'erro', 'details'=>$erro]);
        }
    }

    public function list(){
        $fornecedor = Fornecedor::all();

        if(!empty($fornecedor))
            return response($fornecedor);
        
        return response(['retorno'=>'Lista vazia']);
    }

    public function select ($id){
        $fornecedor = Fornecedor::find($id);

        if(!empty($fornecedor))
            return response($fornecedor);
        
        return response(['retorno'=>'id não encontrado']);
    }

    public function update(Request $request, $id){

        try{

            $validator = Validator::make($request->all(), Fornecedor::RULES);

            if($validator->fails()){

                return response($validator->errors(),422);
            }

            $fornecedor = Fornecedor::find($id);

            if(!empty($fornecedor)){
                $fornecedor->cnpj = $request->cnpj;
                $fornecedor->nome = $request->nome;
                $fornecedor->endereco_id = $request->endereco_id;
            }
            else
                return response(['retorno'=>'id não encontrado']);

            $fornecedor->save();
            return response($request);

        }catch(Exception $erro){
            return  response(['Status'=>'erro', 'details'=>$erro]);
        }
    }

    public function  delete($id){
        try{

            $fornecedor = Fornecedor::find($id);

            if(!empty($fornecedor))
                $fornecedor->delete();
            else
                return response(['retorno'=>'id não encontrado']);

            return response($fornecedor);

        }catch(Exception $erro){
            return  response(['Status'=>'erro', 'details'=>$erro]);
        }
    }
}
