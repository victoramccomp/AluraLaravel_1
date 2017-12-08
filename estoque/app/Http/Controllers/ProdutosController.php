<?php namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ProdutosController extends Controller {
    
    public function lista() {

        $produtos = DB::select('SELECT * FROM produtos');

        return view('listagemProdutos')->with('produtos', $produtos);
    }
}