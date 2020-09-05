<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Categoria;

class CategoriasController extends Controller
{
    public function add(Request $request){

        try{

            $validator = Validator::make($request->all(), Categoria::RULES);

            if($validator->fails()){

                return response($validator->errors(),422);
            }
         
            $categoria = new Categoria();

            $categoria->descricao = $request->descricao;

            $categoria->save();

            return response($request);

        }catch(Exception $erro){
            return  response(['Status'=>'erro', 'details'=>$erro]);
        }
    }

    public function list(){
        $categoria = Categoria::all();

        if(!empty($categoria))
            return response($categoria);
        
        return response(['retorno'=>'Lista vazia']);
    }

    public function select ($id){
        $categoria = Categoria::find($id);

        if(!empty($categoria))
            return response($categoria);
        
        return response(['retorno'=>'id não encontrado']);
    }

    public function update(Request $request, $id){

        try{

            $validator = Validator::make($request->all(), Categoria::RULES);

            if($validator->fails()){

                return response($validator->errors(),422);
            }

            $categoria = Categoria::find($id);

            if(!empty($categoria)){
                $categoria->descricao = $request->descricao;
            }
            else
                return response(['retorno'=>'id não encontrado']);

            $categoria->save();
            return response($request);

        }catch(Exception $erro){
            return  response(['Status'=>'erro', 'details'=>$erro]);
        }
    }

    public function  delete($id){
        try{

            $categoria = Categoria::find($id);

            if(!empty($categoria))
                $categoria->delete();
            else
                return response(['retorno'=>'id não encontrado']);

            return response($categoria);

        }catch(Exception $erro){
            return  response(['Status'=>'erro', 'details'=>$erro]);
        }
    }
}
