<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Cliente;

class ClientesController extends Controller
{
    public function add(Request $request){

        try{

            $validator = Validator::make($request->all(), Cliente::RULES);

            if($validator->fails()){

                return response($validator->errors(),422);
            }
         
            $cliente = new Cliente();

            $cliente->cpf = $request->cpf;
            $cliente->nome = $request->nome;
            $cliente->email = $request->email;
            $cliente->endereco_id = $request->endereco_id;

            $cliente->save();

            return response($request);

        }catch(Exception $erro){
            return  response(['Status'=>'erro', 'details'=>$erro]);
        }
    }

    public function list(){
        $cliente = Cliente::all();

        if(!empty($cliente))
            return response($cliente);
        
        return response(['retorno'=>'Lista vazia']);
    }

    public function select ($id){
        $cliente = Cliente::find($id);

        if(!empty($cliente))
            return response($cliente);
        
        return response(['retorno'=>'id não encontrado']);
    }

    public function update(Request $request, $id){

        try{

            $validator = Validator::make($request->all(), Cliente::RULES);

            if($validator->fails()){

                return response($validator->errors(),422);
            }

            $cliente = Cliente::find($id);

            if(!empty($cliente)){
                $cliente->cpf = $request->cpf;
                $cliente->nome = $request->nome;
                $cliente->email = $request->email;
                $cliente->endereco_id = $request->endereco_id;
            }
            else
                return response(['retorno'=>'id não encontrado']);

            $cliente->save();
            return response($request);

        }catch(Exception $erro){
            return  response(['Status'=>'erro', 'details'=>$erro]);
        }
    }

    public function  delete($id){
        try{

            $cliente = Cliente::find($id);

            if(!empty($cliente))
                $cliente->delete();
            else
                return response(['retorno'=>'id não encontrado']);

            return response($cliente);

        }catch(Exception $erro){
            return  response(['Status'=>'erro', 'details'=>$erro]);
        }
    }
}
