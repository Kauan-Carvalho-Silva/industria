@extends('layouts.app')

@section('title', 'editar tarefa')

@section('content')

<h1>editar tarefa</h1>

<form action="{{ route('tarefas.update', $tarefa->id) }}"
      method="post"
      class="container mt-4"
      style="max-width: 600px;">

    @csrf

    @method('PUT')

    <div class="mb-3">

        <label for="usuario_id" class="form-label">
            Usuario
        </label>

        <select name="usuario_id"
                id="usuario_id"
                class="form-control">

            @foreach($usuarios as $usuario)

                <option value="{{ $usuario->id }}"
                    {{ $tarefa->usuario_id == $usuario->id ? 'selected' : '' }}>

                    {{ $usuario->nome }}

                </option>

            @endforeach

        </select>

        <label for="descricao" class="form-label">
            Descricao
        </label>

        <input type="text"
               name="descricao"
               id="descricao"
               class="form-control"
               value="{{ $tarefa->descricao }}">

        <label for="nome_do_setor" class="form-label">
            Nome do setor
        </label>

        <input type="text"
               name="nome_do_setor"
               id="nome_do_setor"
               class="form-control"
               value="{{ $tarefa->nome_do_setor }}">

        <label for="prioridade" class="form-label">
            Prioridade
        </label>

        <input type="text"
               name="prioridade"
               id="prioridade"
               class="form-control"
               value="{{ $tarefa->prioridade }}">

        <label for="data_de_cadastro" class="form-label">
            Data de cadastro
        </label>

        <input type="datetime-local"
               name="data_de_cadastro"
               id="data_de_cadastro"
               class="form-control"
               value="{{ $tarefa->data_de_cadastro }}">

        <label for="status" class="form-label">
            Status
        </label>

        <input type="text"
               name="status"
               id="status"
               class="form-control"
               value="{{ $tarefa->status }}">

    </div>

    <button type="submit" class="btn btn-success">
        Salvar alterações
    </button>

    <a href="{{ route('tarefas.index') }}"
       class="btn btn-secondary">
        Voltar
    </a>

</form>

@endsection