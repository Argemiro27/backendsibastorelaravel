@extends('dashboard.layout')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Cadastrar Produtos</h1>
        <form method="POST" action="{{ route('produtos.store') }}">
            @csrf
            <div class="form-group">
                <label for="nome">Título do livro:</label>
                <input type="text" class="form-control" id="nome" name="title" required>
            </div>
            <div class="form-group">
                <label for="nome">Descrição:</label>
                <input type="text" class="form-control" id="nome" name="description" required>
            </div>
            <div class="form-group">
                <label for="author_id">Autor:</label>
                <select name="author_id" id="author_id" class="form-control">
                    @foreach (\App\Models\Authors::orderBy('nome_autor')->pluck('nome_autor', 'id') as $id => $nome_autor)
                        <option value="{{ $id }}">{{ $nome_autor }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="available">Disponibilidade:</label>
                <select name="available" id="available" class="form-control">
                    <option value="disponivel">Disponível</option>
                    <option value="indisponivel">Indisponível</option>
                </select>
            </div>
            <div class="form-group">
                <label for="rate">Avaliação:</label>
                <select name="rate" id="rate" class="form-control">
                    <option value="pessimo">Péssimo</option>
                    <option value="ruim">Ruim</option>
                    <option value="regular">Regular</option>
                    <option value="bom">Bom</option>
                    <option value="excelente">Excelente</option>
                </select>
            </div>
            <label for="estoque">Estoque:</label>
            <input type="text" class="form-control" id="estoque" name="estoque" required>
            <label for="estoque">Imagem:</label>
            <input type="text" class="form-control" id="image" name="image" required>
            <label for="preco">Preço</label>
            <input type="text" class="form-control" id="price" name="price" required>

    </div>

    <button type="submit" class="btn btn-primary submit">Cadastrar</button>
    </form>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    </div>
@endsection
