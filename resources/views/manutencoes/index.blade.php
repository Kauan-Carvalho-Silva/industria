<h1>Manutenções</h1>

<a href="{{ route('manutencoes.create') }}">
    Criar Manutenção
</a>

<br><br>

<table border="1">

    <tr>
        <th>ID</th>
        <th>Equipamento</th>
        <th>Funcionário</th>
        <th>Tipo</th>
        <th>Descrição</th>
        <th>Data</th>
        <th>Próxima</th>
        <th>Custo</th>
        <th>Status</th>
        <th>Ações</th>
    </tr>

    @foreach($manutencoes as $manutencao)

    <tr>
        <td>{{ $manutencao->id }}</td>
        <td>{{ $manutencao->equipamento_id }}</td>
        <td>{{ $manutencao->funcionario_id }}</td>
        <td>{{ $manutencao->tipo }}</td>
        <td>{{ $manutencao->descricao }}</td>
        <td>{{ $manutencao->data_manutencao }}</td>
        <td>{{ $manutencao->proxima_manutencao }}</td>
        <td>{{ $manutencao->custo }}</td>
        <td>{{ $manutencao->status }}</td>

        <td>
            <a href="{{ route('manutencoes.show', $manutencao) }}">
                Ver
            </a>

            <a href="{{ route('manutencoes.edit', ['manutencao' => $manutencao->id]) }}">
                Editar
            </a>

            <form
                action="{{ route('manutencoes.destroy', $manutencao) }}"
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