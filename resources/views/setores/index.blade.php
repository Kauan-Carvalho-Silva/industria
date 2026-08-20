@extends('layouts.app')
@section('title', 'Lista de setores')
@section('content')
    <h1>Lista de setores</h1>
    <a class="btn btn-primary" href="{{ route('setores.create') }}" role="button">Novo</a>
    <table class="table">
        <thead class="table-info">
            <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Opções</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($setores as $setor)
            <tr class="table-info">
                <td>{{ $setor->id }}</td>
                <td>{{ $setor->nome }}</td>
                <td>{{ $setor->ativo ? 'Ativo' : 'Desativado'}}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('setores.show', $setor->id) }}" role="button">Visualizar</a>
                    <a class="btn btn-primary" href="{{ route('setores.edit', $setor->id) }}" role="button">Editar</a>
                    <form action="{{ route('setores.ativar-desativar', $setor->id) }}" method="POST" style="display: inline-block;">
                       @csrf
                       @method('PATCH')
                          <button class="btn btn-sm {{ $setor->ativo ? 'btn-success' : 'btn-warning' }}">{{ $setor->ativo ? 'Desativar' : 'Ativar' }}</button>
                    </form>
            </tr>
        @endforeach
    </tbody>
</table>
