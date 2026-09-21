@extends('layouts.app')

@section('title', 'visualizar tarefa')

@section('content')

<h1>visualizar tarefa</h1>

<div class="container mt-4">

    <div class="card">

        <div class="card-header">

            Tarefa #{{ $tarefa->id }}

        </div>

        <div class="card-body">

            <p>
                <strong>Usuario:</strong>

                {{ $tarefa->usuario->nome ?? 'Usuario não encontrado' }}
            </p>

            <p>
                <strong>Descricao:</strong>

                {{ $tarefa->descricao }}
            </p>

            <p>
                <strong>Nome do setor:</strong>

                {{ $tarefa->nome_setor }}
            </p>

            <p>
                <strong>Prioridade:</strong>

                {{ $tarefa->prioridade }}
            </p>

            <p>
                <strong>Data de cadastro:</strong>

                {{ $tarefa->data_cadastro }}
            </p>

            <p>
                <strong>Status:</strong>

                {{ $tarefa->status }}
            </p>

            <a href="{{ route('tarefas.index') }}"
               class="btn btn-secondary">

                Voltar

            </a>

            <a href="{{ route('tarefas.edit', $tarefa->id) }}"
               class="btn btn-warning">

                Editar

            </a>

        </div>

    </div>

</div>

@endsection