<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipamentos</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<div class="container mt-5">

    <h1 class="mb-4">Equipamentos</h1>

    <form
        method="GET"
        action="{{ route('equipamentos.index') }}"
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
            <label class="form-label">Status</label>

            <select
                name="status"
                class="form-select"
            >
                <option value="">Todos os status</option>

                <option
                    value="ativo"
                    {{ request('status') == 'ativo' ? 'selected' : '' }}
                >
                    Ativo
                </option>

                <option
                    value="manutencao"
                    {{ request('status') == 'manutencao' ? 'selected' : '' }}
                >
                    Manutenção
                </option>

                <option
                    value="inativo"
                    {{ request('status') == 'inativo' ? 'selected' : '' }}
                >
                    Inativo
                </option>
            </select>
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
            <label class="form-label">Patrimônio</label>

            <input
                type="text"
                name="patrimonio"
                class="form-control"
                placeholder="Digite o patrimônio"
                value="{{ request('patrimonio') }}"
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
                href="{{ route('equipamentos.index') }}"
                class="btn btn-secondary"
            >
                Limpar
            </a>

            <a
                href="{{ route('equipamentos.create') }}"
                class="btn btn-success"
            >
                Novo Equipamento
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
                <th>Patrimônio</th>
                <th>Setor</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>

            @forelse($equipamentos as $equipamento)

                <tr>
                    <td>{{ $equipamento->nome }}</td>

                    <td>{{ $equipamento->patrimonio }}</td>

                    <td>{{ $equipamento->setor_id }}</td>

                    <td>{{ $equipamento->status }}</td>

                    <td>
                        <a
                            href="{{ route('equipamentos.edit', $equipamento) }}"
                            class="btn btn-primary btn-sm"
                        >
                            Editar
                        </a>

                        <form
                            action="{{ route('equipamentos.destroy', $equipamento) }}"
                            method="POST"
                            style="display: inline;"
                        >
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Deseja realmente excluir este equipamento?')"
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
                        Nenhum equipamento encontrado.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

</body>
</html>