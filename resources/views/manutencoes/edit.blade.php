<h1>Editar Manutenção</h1>

<form
    action="{{ route('manutencoes.update', ['manutencao' => $manutencao->id]) }}"
    method="POST"
>
    @csrf
    @method('PUT')

    <label>Equipamento:</label>

    <select name="equipamento_id">

        @foreach($equipamentos as $equipamento)

            <option
                value="{{ $equipamento->id }}"
                {{ $manutencao->equipamento_id == $equipamento->id ? 'selected' : '' }}
            >
                {{ $equipamento->nome }}
            </option>

        @endforeach

    </select>

    <br><br>

    <label>Funcionário:</label>

    <select name="funcionario_id">

        @foreach($funcionarios as $funcionario)

            <option
                value="{{ $funcionario->id }}"
                {{ $manutencao->funcionario_id == $funcionario->id ? 'selected' : '' }}
            >
                {{ $funcionario->nome }}
            </option>

        @endforeach

    </select>

    <br><br>

    <label>Tipo:</label>

    <select name="tipo">
        <option value="Preventiva" {{ $manutencao->tipo == 'Preventiva' ? 'selected' : '' }}>
            Preventiva
        </option>

        <option value="Corretiva" {{ $manutencao->tipo == 'Corretiva' ? 'selected' : '' }}>
            Corretiva
        </option>

        <option value="Preditiva" {{ $manutencao->tipo == 'Preditiva' ? 'selected' : '' }}>
            Preditiva
        </option>
    </select>

    <br><br>

    <label>Descrição:</label>
    <textarea name="descricao">{{ $manutencao->descricao }}</textarea>

    <br><br>

    <label>Data:</label>
    <input
        type="date"
        name="data_manutencao"
        value="{{ $manutencao->data_manutencao }}"
    >

    <br><br>

    <label>Próxima manutenção:</label>
    <input
        type="date"
        name="proxima_manutencao"
        value="{{ $manutencao->proxima_manutencao }}"
    >

    <br><br>

    <label>Custo:</label>
    <input
        type="number"
        step="0.01"
        name="custo"
        value="{{ $manutencao->custo }}"
    >

    <br><br>

    <label>Status:</label>

    <select name="status">

        <option value="Pendente" {{ $manutencao->status == 'Pendente' ? 'selected' : '' }}>
            Pendente
        </option>

        <option value="Em andamento" {{ $manutencao->status == 'Em andamento' ? 'selected' : '' }}>
            Em andamento
        </option>

        <option value="Concluída" {{ $manutencao->status == 'Concluída' ? 'selected' : '' }}>
            Concluída
        </option>

    </select>

    <br><br>

    <button type="submit">Atualizar</button>

</form>