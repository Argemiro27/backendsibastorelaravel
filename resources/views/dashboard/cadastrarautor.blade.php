@extends('dashboard.layout')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Cadastrar autor:</h1>
        <form method="POST" action="{{ route('authors.store') }}">
            @csrf
            <div class="form-group">
                <label for="nome">Nome do autor:</label>
                <input type="text" class="form-control" id="nome_autor" name="nome_autor" required>
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
