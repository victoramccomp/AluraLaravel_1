<?php namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;

class ProdutosController extends Controller {
    
    public function lista() 
    {
        $produtos = DB::select('SELECT * FROM produtos');

        return view('listagemProdutos')->with('produtos', $produtos);
    }

    public function visualizar()
    {   
        /*
            // Métodos úteis do Request
            $input = Request::all(); // lista todos os params
            $input = Request::only('nome', 'id'); // apenas nome e id
            $input = Request::except('id'); // todos os params, menos o id
            $url = Request::url(); // http://localhost:8000/produtos/visualizar
            $uri = Request::path(); // produtos/visualizar
        */

        $id = Request::input('id');
        $produto = DB::select('SELECT * FROM produtos WHERE id = ?', [$id]);
   
        if(empty($produto)) {
            return "Esse produto não existe";
        }

        return view('detalhesProduto')->with('produto', $produto[0]);
    }
}