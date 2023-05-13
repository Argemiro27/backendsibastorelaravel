@extends('dashboard.layout')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Listar Produtos</h1>
        @if(count($produtos) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Título</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Disponibilidade</th>
                        <th scope="col">Avaliação</th>
                        <th scope="col">Estoque</th>
                        <th scope="col">Imagem</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $produto)
                        <tr>
                            <th scope="row">{{ $produto->id }}</th>
                            <td>{{ $produto->title }}</td>
                            <td>{{ $produto->description }}</td>
                            <td>{{ $produto->author->nome_autor }}</td>
                            <td>{{ $produto->available }}</td>
                            <td>{{ $produto->rate }}</td>
                            <td>{{ $produto->estoque }}</td>
                            <td><img src="{{ $produto->image }}" width="50"></td>
                            <td>{{ $produto->price }}</td>
                            <td>
                                <a href="{{ route('produtos.edit', $produto->id) }}">Editar</a>
                                <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Nenhum produto cadastrado.</p>
        @endif
    </div>
@endsection
