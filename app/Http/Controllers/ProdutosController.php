<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Produto;

class ProdutosController extends Controller
{
    public function add(Request $request){

        try{

            $validator = Validator::make($request->all(), Produto::RULES);

            if($validator->fails()){

                return response($validator->errors(),422);
            }
         
            $produto = new Produto();

            $produto->modelo = $request->modelo;
            $produto->descricao = $request->descricao;
            $produto->preco = $request->preco;
            $produto->categoria_id = $request->categoria_id;
            $produto->fabricante_id = $request->fabricante_id;

            $produto->save();

            return response($request);

        }catch(Exception $erro){
            return  response(['Status'=>'erro', 'details'=>$erro]);
        }
    }

    public function list(){
        $produto = Produto::all();

        if(!empty($produto))
            return response($produto);
        
        return response(['retorno'=>'Lista vazia']);
    }

    public function select ($id){
        $produto = Produto::find($id);

        if(!empty($produto))
            return response($produto);
        
        return response(['retorno'=>'id não encontrado']);
    }

    public function update(Request $request, $id){

        try{

            $validator = Validator::make($request->all(), Produto::RULES);

            if($validator->fails()){

                return response($validator->errors(),422);
            }

            $produto = Produto::find($id);

            if(!empty($produto)){
                $produto->modelo = $request->modelo;
                $produto->descricao = $request->descricao;
                $produto->preco = $request->preco;
                $produto->categoria_id = $request->categoria_id;
                $produto->fabricante_id = $request->fabricante_id;
            }
            else
                return response(['retorno'=>'id não encontrado']);

            $produto->save();
            return response($request);

        }catch(Exception $erro){
            return  response(['Status'=>'erro', 'details'=>$erro]);
        }
    }

    public function  delete($id){
        try{

            $produto = Produto::find($id);

            if(!empty($produto))
                $produto->delete();
            else
                return response(['retorno'=>'id não encontrado']);

            return response($produto);

        }catch(Exception $erro){
            return  response(['Status'=>'erro', 'details'=>$erro]);
        }
    }
}
