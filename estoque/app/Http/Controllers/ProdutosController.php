<?php namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ProdutosController extends Controller {
    
    public function lista() {

        $html = '<h1>Listagem de produtos com Laravel</h1>';

        $html .= '<ul>';

        $produtos = DB::select('SELECT * FROM produtos');

        foreach ($produtos as $produto) {
            $html .= '<li> Nome: '. $produto->nome .', Descrição: '. $produto->descricao .'</li>';
        }

        $html .= '</ul>';

        return $html;
    }
}