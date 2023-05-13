<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Authors::all();
        return view('authors.index', ['authors' => $authors]);
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        $author = new Authors;
        $author->nome_autor = $request->nome_autor;
        $author->save();
        return redirect()->back()->with('success', 'Autor cadastrado com sucesso!');
    }

    public function edit(Authors $author)
    {
        return view('authors.edit', ['author' => $author]);
    }

    public function update(Request $request, Authors $author)
    {
        $author->nome_autor = $request->nome_autor;
        $author->save();
        return redirect()->route('author.index');
    }

    public function destroy(Authors $author)
    {
        $author->delete();
        return redirect()->route('authors.index');
    }
    public function buscar(Request $request)
    {
        $termo = $request->get('termo');

        $authors = Authors::where('nome_autor', 'like', "%$termo%")->get();

        return view('authors.index', ['authors' => $authors]);
    }

}
