<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionários</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<div class="container mt-5">

    <h1 class="mb-4">Funcionários</h1>

    <form
        method="GET"
        action="{{ route('funcionarios.index') }}"
        class="row g-3 mb-4"
    >

        <div class="col-md-3">
            <label class="form-label">Nome</label>

            <input
                type="text"
                name="nome"
                class="form-control"
                placeholder="Digite o nome"
                value="{{ request('nome') }}"
            >
        </div>

        <div class="col-md-3">
            <label class="form-label">Cargo</label>

            <input
                type="text"
                name="cargo"
                class="form-control"
                placeholder="Digite o cargo"
                value="{{ request('cargo') }}"
            >
        </div>

        <div class="col-md-3">
            <label class="form-label">Setor</label>

            <select
                name="setor_id"
                class="form-select"
            >
                <option value="">Todos os setores</option>

                @foreach($setores as $setor)
                    <option
                        value="{{ $setor->id }}"
                        {{ request('setor_id') == $setor->id ? 'selected' : '' }}
                    >
                        {{ $setor->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <label class="form-label">Matrícula</label>

            <input
                type="text"
                name="matricula"
                class="form-control"
                placeholder="Digite a matrícula"
                value="{{ request('matricula') }}"
            >
        </div>

        <div class="col-12">
            <button
                type="submit"
                class="btn btn-primary"
            >
                Filtrar
            </button>

            <a
                href="{{ route('funcionarios.index') }}"
                class="btn btn-secondary"
            >
                Limpar
            </a>

            <a
                href="{{ route('funcionarios.create') }}"
                class="btn btn-success"
            >
                Novo Funcionário
            </a>
        </div>

    </form>

    @if($setorSelecionado)
        <div class="alert alert-info">
            <strong>Setor selecionado:</strong>
            {{ $setorSelecionado->nome }}
        </div>
    @endif

    <table class="table table-bordered table-striped">

        <thead>
            <tr>
                <th>Nome</th>
                <th>Matrícula</th>
                <th>Cargo</th>
                <th>Setor</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>

            @forelse($funcionarios as $funcionario)

                <tr>
                    <td>{{ $funcionario->nome }}</td>

                    <td>{{ $funcionario->matricula }}</td>

                    <td>{{ $funcionario->cargo }}</td>

                    <td>{{ $funcionario->setor_id }}</td>

                    <td>
                        <a
                            href="{{ route('funcionarios.edit', $funcionario) }}"
                            class="btn btn-primary btn-sm"
                        >
                            Editar
                        </a>

                        <form
                            action="{{ route('funcionarios.destroy', $funcionario) }}"
                            method="POST"
                            style="display: inline;"
                        >
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Deseja realmente excluir este funcionário?')"
                            >
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>

            @empty

                <tr>
                    <td
                        colspan="5"
                        class="text-center"
                    >
                        Nenhum funcionário encontrado.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

</body>
</html>