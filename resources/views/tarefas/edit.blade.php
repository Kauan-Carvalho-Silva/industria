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
                class="form-control"
                required>

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
               value="{{ $tarefa->descricao }}"
               required>

        <label for="nome_setor" class="form-label">
            Nome do setor
        </label>

        <input type="text"
               name="nome_setor"
               id="nome_setor"
               class="form-control"
               value="{{ $tarefa->nome_setor }}"
               required>

        <label for="prioridade" class="form-label">
            Prioridade
        </label>

        <select name="prioridade"
                id="prioridade"
                class="form-control"
                required>

            <option value="baixa"
                {{ $tarefa->prioridade == 'baixa' ? 'selected' : '' }}>

                baixa

            </option>

            <option value="media"
                {{ $tarefa->prioridade == 'media' ? 'selected' : '' }}>

                media

            </option>

            <option value="alta"
                {{ $tarefa->prioridade == 'alta' ? 'selected' : '' }}>

                alta

            </option>

        </select>

        <label for="data_cadastro" class="form-label">
            Data de cadastro
        </label>

        <input type="datetime-local"
               name="data_cadastro"
               id="data_cadastro"
               class="form-control"
               value="{{ $tarefa->data_cadastro ? date('Y-m-d\TH:i', strtotime($tarefa->data_cadastro)) : '' }}">

        <label for="status" class="form-label">
            Status
        </label>

        <select name="status"
                id="status"
                class="form-control"
                required>

            <option value="a_fazer"
                {{ $tarefa->status == 'a_fazer' ? 'selected' : '' }}>

                A fazer

            </option>

            <option value="fazendo"
                {{ $tarefa->status == 'fazendo' ? 'selected' : '' }}>

                Fazendo

            </option>

            <option value="pronto"
                {{ $tarefa->status == 'pronto' ? 'selected' : '' }}>

                Pronto

            </option>

        </select>

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