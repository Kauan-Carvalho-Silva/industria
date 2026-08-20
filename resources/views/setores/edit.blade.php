@extends('layouts.app')
@section('title', 'Cadastro de setor')
@section('content')
<h1>Cadastro de setor</h1>
<form action="{{ route('setores.update', $setor->id) }}" method="POST" class= "container mt-4">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" name="nome" id="nome" class="form-control" value="{{ $setor->nome }}">
    </div>
    <button type="submit" class="btn btn-success">Cadastrar</button>
</form>
@endsection