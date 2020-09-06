<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Venda_item;

class Venda_itensController extends Controller
{
    public function add(Request $request){

        try{

            $validator = Validator::make($request->all(), Venda_item::RULES);

            if($validator->fails()){

                return response($validator->errors(),422);
            }
         
            $venda_itens = new Venda_item();

            $venda_itens->venda_id = $request->venda_id;
            $venda_itens->produto_id = $request->produto_id;

            $venda_itens->save();

            return response($request);

        }catch(Exception $erro){
            return  response(['Status'=>'erro', 'details'=>$erro]);
        }
    }

    public function list(){
        $venda_itens = Venda_item::all();

        if(!empty($venda_itens))
            return response($venda_itens);
        
        return response(['retorno'=>'Lista vazia']);
    }

    public function select($venda_id){
        $venda_itens = Venda_item::where('venda_id', $venda_id)->with('produto')->get();

        if(!empty($venda_itens))
            return response($venda_itens);
        
        return response(['retorno'=>'id não encontrado']);
    }

    public function update(Request $request, $venda_id, $produto_id){

        try{

            $validator = Validator::make($request->all(), Venda_item::RULES);

            if($validator->fails()){

                return response($validator->errors(),422);
            }

            $venda_itens = Venda_item::where('venda_id', $venda_id)->where('produto_id', $produto_id)->get()->first();

            if(!empty($venda_itens)){
                $venda_itens->venda_id = $request->venda_id;
                $venda_itens->produto_id = $request->produto_id;
            }
            else
                return response(['retorno'=>'id não encontrado']);

            $venda_itens->save();
            return response($request);

        }catch(Exception $erro){
            return  response(['Status'=>'erro', 'details'=>$erro]);
        }
    }

    public function  delete($venda_id, $produto_id){
        try{

            $venda_itens = Venda_item::where('venda_id', $venda_id)->where('produto_id', $produto_id)->get()->first();

            if(!empty($venda_itens))
                $venda_itens->delete();
            else
                return response(['retorno'=>'id não encontrado']);

            return response($venda_itens);

        }catch(Exception $erro){
            return  response(['Status'=>'erro', 'details'=>$erro]);
        }
    }
}
