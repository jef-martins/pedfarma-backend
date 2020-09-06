<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Venda;

class VendasController extends Controller
{
    public function add(Request $request){

        try{

            $validator = Validator::make($request->all(), Venda::RULES);

            if($validator->fails()){

                return response($validator->errors(),422);
            }
         
            $venda = new Venda();

            $venda->cliente_id = $request->cliente_id;

            $venda->save();

            return response($venda);

        }catch(Exception $erro){
            return  response(['Status'=>'erro', 'details'=>$erro]);
        }
    }

    public function list(){
        $venda = Venda::with('cliente')->get();

        if(!empty($venda))
            return response($venda);
        
        return response(['retorno'=>'Lista vazia']);
    }

    public function select ($id){
        $venda = Venda::where('id', $id)->with('cliente')->first();

        if(!empty($venda))
            return response($venda);
        
        return response(['retorno'=>'id não encontrado']);
    }

    public function update(Request $request, $id){

        try{

            $validator = Validator::make($request->all(), Venda::RULES);

            if($validator->fails()){

                return response($validator->errors(),422);
            }

            $venda = Venda::find($id);

            if(!empty($venda)){
                $venda->cliente_id = $request->cliente_id;
            }
            else
                return response(['retorno'=>'id não encontrado']);

            $venda->save();
            return response($request);

        }catch(Exception $erro){
            return  response(['Status'=>'erro', 'details'=>$erro]);
        }
    }

    public function  delete($id){
        try{

            $venda = Venda::find($id);

            if(!empty($venda))
                $venda->delete();
            else
                return response(['retorno'=>'id não encontrado']);

            return response($venda);

        }catch(Exception $erro){
            return  response(['Status'=>'erro', 'details'=>$erro]);
        }
    }
}
