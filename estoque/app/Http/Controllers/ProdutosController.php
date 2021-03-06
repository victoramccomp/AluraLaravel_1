<?php namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;

class ProdutosController extends Controller {
    
    public function listar() 
    {
        $produtos = DB::select('SELECT * FROM produtos');

        return view('produto.listagem')->with('produtos', $produtos);
    }

    public function apiListar()
    {
        $produtos = DB::select('SELECT * FROM produtos');

        return response()->json($produtos);
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

        return view('produto.detalhes')->with('produto', $produto[0]);
    }

    public function adicionar() 
    {
        return view('produto.adicionar');
    }

    public function inserir() 
    {
        $nome = Request::input('nome');
        $descricao = Request::input('descricao');
        $valor = Request::input('valor');
        $quantidade = Request::input('quantidade');
        
        DB::insert('INSERT INTO produtos VALUES (NULL, ?, ?, ?, ?)', array($nome, $valor, $descricao, $quantidade));

        return redirect()->action('ProdutosController@listar')->withInput(Request::only('nome'));
    }
}