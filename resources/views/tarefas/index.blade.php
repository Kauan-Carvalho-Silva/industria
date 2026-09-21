@extends('layouts.app')

@section('title', 'lista de tarefas')

@section('content')

<h1>lista de tarefas</h1>

<a class="btn btn-primary mb-4"
   href="{{ route('tarefas.create') }}"
   role="button">

    novo

</a>

<div class="container">

    <div class="row">

        @foreach($tarefas as $tarefa)

            <div class="col-md-4 mb-4">

                <div class="card">

                    <div class="card-header">

                        Tarefa #{{ $tarefa->id }}

                    </div>

                    <div class="card-body">

                        <h5 class="card-title">

                            {{ $tarefa->descricao }}

                        </h5>

                        <p class="card-text">

                            <strong>Usuario:</strong>

                            {{ $tarefa->usuario->nome ?? 'Usuario não encontrado' }}

                        </p>

                        <p class="card-text">

                            <strong>Setor:</strong>

                            {{ $tarefa->nome_setor }}

                        </p>

                        <p class="card-text">

                            <strong>Prioridade:</strong>

                            {{ $tarefa->prioridade }}

                        </p>

                        <p class="card-text">

                            <strong>Data:</strong>

                            {{ $tarefa->data_cadastro }}

                        </p>

                        <p class="card-text">

                            <strong>Status:</strong>

                            {{ $tarefa->status }}

                        </p>

                        <a class="btn btn-primary"
                           href="{{ route('tarefas.show', $tarefa->id) }}">

                            visualizar

                        </a>

                        <a class="btn btn-warning"
                           href="{{ route('tarefas.edit', $tarefa->id) }}">

                            editar

                        </a>

                        <form action="{{ route('tarefas.destroy', $tarefa->id) }}"
                              method="post"
                              class="d-inline">

                            @csrf

                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger">

                                excluir

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        @endforeach

    </div>

</div>

@endsection