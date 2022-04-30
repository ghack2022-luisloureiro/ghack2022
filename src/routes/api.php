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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('produtos', [\App\Http\Controllers\ProdutoController::class, 'index']);

Route::get('produtos/{id}', [\App\Http\Controllers\ProdutoController::class, 'show']);

Route::get('/produto/{nome}', function ($nome) {

    $headline = Illuminate\Support\Str::headline($nome);
    $produto = \App\Models\Produto::where('nome', $headline)->first();
    $item = Illuminate\Support\Facades\DB::table('produtos')
        ->join('item',  'produtos.id', '=', 'item.produto_id')
        ->select('item.*', 'produtos.nome as produtoNome')
        ->where('produto_id',  $produto->id)
        ->get();

    return \App\Http\Resources\Item::collection($item);
});


Route::get('items', [\App\Http\Controllers\ItemController::class, 'index']);


Route::get('/item/{id}', function ($id) {

    $produto = Illuminate\Support\Facades\DB::table('produtos')
        ->join('item',  'produtos.id', '=', 'item.produto_id')
        ->select('item.*', 'produtos.nome as produtoNome')
        ->where('produto_id', $id)
        ->get();

    return \App\Http\Resources\Item::collection($produto);
});



Route::get('/barcode/{id}', function ($id) {

    $produto = \App\Models\Item::where('barcode',$id)->get();

    return \App\Http\Resources\Item::collection($produto);
});