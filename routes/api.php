<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
============================================================================
*/

Route::get('/teste', 'EstadosController@teste');

//Rotas para o Estado - UF
Route::group(['prefix' => 'estado'], function(){

    Route::post('/estados', 'EstadosController@add');

    Route::get('/estados', 'EstadosController@list');

    Route::get('/estados/{id}', 'EstadosController@select');

    Route::put('/estados/{id}', 'EstadosController@update');

    Route::delete('/estados/{id}','EstadosController@delete');
});

//Rotas para o Cidades
Route::group(['prefix' => 'cidade'], function(){

    Route::post('/cidades', 'CidadesController@add');

    Route::get('/cidades', 'CidadesController@list');

    Route::get('/cidades/{id}', 'CidadesController@select');

    Route::put('/cidades/{id}', 'CidadesController@update');

    Route::delete('/cidades/{id}','CidadesController@delete');
});

//Rotas para o Bairros
Route::group(['prefix' => 'bairro'], function(){

    Route::post('/bairros', 'BairrosController@add');

    Route::get('/bairros', 'BairrosController@list');

    Route::get('/bairros/{id}', 'BairrosController@select');

    Route::put('/bairros/{id}', 'BairrosController@update');

    Route::delete('/bairros/{id}','BairrosController@delete');
});

//Rotas para o endereços
Route::group(['prefix' => 'endereco'], function(){

    Route::post('/enderecos', 'EnderecosController@add');

    Route::get('/enderecos', 'EnderecosController@list');

    Route::get('/enderecos/{id}', 'EnderecosController@select');

    Route::put('/enderecos/{id}', 'EnderecosController@update');

    Route::delete('/enderecos/{id}','EnderecosController@delete');
});

//Rotas para o fornecedores
Route::group(['prefix' => 'fornecedor'], function(){

    Route::post('/fornecedores', 'FornecedoresController@add');

    Route::get('/fornecedores', 'FornecedoresController@list');

    Route::get('/fornecedores/{id}', 'FornecedoresController@select');

    Route::put('/fornecedores/{id}', 'FornecedoresController@update');

    Route::delete('/fornecedores/{id}','FornecedoresController@delete');
});

//Rotas para o fornecedores
Route::group(['prefix' => 'cliente'], function(){

    Route::post('/clientes', 'ClientesController@add');

    Route::get('/clientes', 'ClientesController@list');

    Route::get('/clientes/{id}', 'ClientesController@select');

    Route::put('/clientes/{id}', 'ClientesController@update');

    Route::delete('/clientes/{id}','ClientesController@delete');
});

//Rotas para o Categorias
Route::group(['prefix' => 'categoria'], function(){

    Route::post('/categorias', 'CategoriasController@add');

    Route::get('/categorias', 'CategoriasController@list');

    Route::get('/categorias/{id}', 'CategoriasController@select');

    Route::put('/categorias/{id}', 'CategoriasController@update');

    Route::delete('/categorias/{id}','CategoriasController@delete');
});

//Rotas para o Fabricantes
Route::group(['prefix' => 'fabricante'], function(){

    Route::post('/fabricantes', 'FabricantesController@add');

    Route::get('/fabricantes', 'FabricantesController@list');

    Route::get('/fabricantes/{id}', 'FabricantesController@select');

    Route::put('/fabricantes/{id}', 'FabricantesController@update');

    Route::delete('/fabricantes/{id}','FabricantesController@delete');
});

//Rotas para o Produtos
Route::group(['prefix' => 'produto'], function(){

    Route::post('/produtos', 'ProdutosController@add');

    Route::get('/produtos', 'ProdutosController@list');

    Route::get('/produtos/{id}', 'ProdutosController@select');

    Route::put('/produtos/{id}', 'ProdutosController@update');

    Route::delete('/produtos/{id}','ProdutosController@delete');
});

//Rotas para a vendas
Route::group(['prefix' => 'venda'], function(){

    Route::post('/vendas', 'VendasController@add');

    Route::get('/vendas', 'VendasController@list');

    Route::get('/vendas/{id}', 'VendasController@select');

    Route::put('/vendas/{id}', 'VendasController@update');

    Route::delete('/vendas/{id}','VendasController@delete');
});

//Rotas para a vendas_itens
Route::group(['prefix' => 'venda_item'], function(){

    Route::post('/venda_itens', 'Venda_itensController@add');

    Route::get('/venda_itens', 'Venda_itensController@list');

    Route::get('/venda_itens/{venda_id}/{produto_id}', 'Venda_itensController@select');

    Route::put('/venda_itens/{venda_id}/{produto_id}', 'Venda_itensController@update');

    Route::delete('/venda_itens/{venda_id}/{produto_id}','Venda_itensController@delete');
});