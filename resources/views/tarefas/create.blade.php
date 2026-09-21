@extends('layouts.app')

@section('title', 'cadastro de tarefa')

@section('content')

<h1>cadastro de tarefas</h1>

<form action="{{ route('tarefas.store') }}"
      method="post"
      class="container mt-4"
      style="max-width: 600px;">

    @csrf

    <div class="mb-3">

        <label for="usuario_id" class="form-label">
            Usuario
        </label>

        <select name="usuario_id"
                id="usuario_id"
                class="form-control"
                required>

            <option value="">
                Selecione um usuario
            </option>

            @foreach($usuarios as $usuario)

                <option value="{{ $usuario->id }}">
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
               required>

        <label for="nome_setor" class="form-label">
            Nome do setor
        </label>

        <input type="text"
               name="nome_setor"
               id="nome_setor"
               class="form-control"
               required>

        <label for="prioridade" class="form-label">
            Prioridade
        </label>

        <select name="prioridade"
                id="prioridade"
                class="form-control"
                required>

            <option value="baixa">
                baixa
            </option>

            <option value="media">
                media
            </option>

            <option value="alta">
                alta
            </option>

        </select>

        <label for="data_cadastro" class="form-label">
            Data de cadastro
        </label>

        <input type="datetime-local"
               name="data_cadastro"
               id="data_cadastro"
               class="form-control">

        <label for="status" class="form-label">
            Status
        </label>

        <select name="status"
                id="status"
                class="form-control"
                required>

            <option value="a fazer">
                A fazer
            </option>   

            <option value="fazendo">
                Fazendo
            </option>

            <option value="pronto">
                Pronto
            </option>

        </select>

    </div>

    <button type="submit" class="btn btn-success">
        Salvar
    </button>

</form>

@endsection