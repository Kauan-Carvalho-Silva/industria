<h1>Ordens de Produção</h1>

<a href="{{ route('ordens_producao.create') }}">
    Criar Ordem de Produção
</a>

<br><br>

<table border="1">

    <tr>
        <th>ID</th>
        <th>Setor</th>
        <th>Responsável</th>
        <th>Código</th>
        <th>Produto</th>
        <th>Planejada</th>
        <th>Produzida</th>
        <th>Data Início</th>
        <th>Data Fim</th>
        <th>Status</th>
        <th>Observações</th>
        <th>Ações</th>
    </tr>

    @foreach($ordens as $ordem)

    <tr>

        <td>{{ $ordem->id }}</td>

        <td>{{ $ordem->setor_id }}</td>

        <td>{{ $ordem->responsavel_id }}</td>

        <td>{{ $ordem->codigo_ordem }}</td>

        <td>{{ $ordem->produto }}</td>

        <td>{{ $ordem->quantidade_planejada }}</td>

        <td>{{ $ordem->quantidade_produzida }}</td>

        <td>{{ $ordem->data_inicio }}</td>

        <td>{{ $ordem->data_fim }}</td>

        <td>{{ $ordem->status }}</td>

        <td>{{ $ordem->observacoes }}</td>

        <td>

            <a href="{{ route('ordens_producao.show', $ordem) }}">
                Ver
            </a>

            <a href="{{ route('ordens_producao.edit', $ordem) }}">
                Editar
            </a>

            <form
                action="{{ route('ordens_producao.destroy', $ordem) }}"
                method="POST"
                style="display:inline"
            >

                @csrf
                @method('DELETE')

                <button type="submit">
                    Excluir
                </button>

            </form>

        </td>

    </tr>

    @endforeach

</table>