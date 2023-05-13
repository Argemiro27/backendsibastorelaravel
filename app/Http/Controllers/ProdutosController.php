<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use App\Models\Produtos;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index()
    {
        $produtos = Produtos::all();
        return view('dashboard.produtos.index', compact('produtos'));
    }

    public function create()
    {
        return view('produtos.create', compact('authors'));
    }

    public function store(Request $request)
    {
        $produto = new Produtos;
        $produto->title = $request->title;
        $produto->description = $request->description;
        $produto->available = $request->available;
        $produto->rate = $request->rate;
        $produto->author_id = $request->author_id;
        $produto->estoque = $request->estoque;
        $produto->image = $request->image;
        $produto->price = $request->price;
        $produto->save();
        return redirect()->back()->with('success', 'Produto cadastrado com sucesso!');
    }

    public function edit(Produtos $produto)
    {
        return view('produtos.edit', ['produto' => $produto]);
    }

    public function update(Request $request, Produtos $produto)
    {
        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->save();
        return redirect()->route('produtos.index');
    }

    public function destroy(Produtos $produto)
    {
        $produto->delete();
        return redirect()->route('produtos.index');
    }
    public function buscar(Request $request)
    {
        $termo = $request->get('termo');

        $produtos = Produtos::where('nome', 'like', "%$termo%")->get();

        return response()->json($produtos);
    }

}
