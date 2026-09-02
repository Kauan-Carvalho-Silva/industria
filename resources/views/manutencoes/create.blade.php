<h1>Cadastrar Manutenção</h1>

<form action="{{ route('manutencoes.store') }}" method="POST">

    @csrf

    <label>Equipamento:</label>

    <select name="equipamento_id">

        @foreach($equipamentos as $equipamento)

            <option value="{{ $equipamento->id }}">
                {{ $equipamento->nome }}
            </option>

        @endforeach

    </select>

    <br><br>

    <label>Funcionário:</label>

    <select name="funcionario_id">

        @foreach($funcionarios as $funcionario)

            <option value="{{ $funcionario->id }}">
                {{ $funcionario->nome }}
            </option>

        @endforeach

    </select>

    <br><br>

    <label>Tipo:</label>

    <select name="tipo">
        <option value="Preventiva">Preventiva</option>
        <option value="Corretiva">Corretiva</option>
        <option value="Preditiva">Preditiva</option>
    </select>

    <br><br>

    <label>Descrição:</label>
    <textarea name="descricao"></textarea>

    <br><br>

    <label>Data:</label>
    <input type="date" name="data_manutencao">

    <br><br>

    <label>Próxima manutenção:</label>
    <input type="date" name="proxima_manutencao">

    <br><br>

    <label>Custo:</label>
    <input type="number" step="0.01" name="custo">

    <br><br>

    <label>Status:</label>

    <select name="status">
        <option value="Pendente">Pendente</option>
        <option value="Em andamento">Em andamento</option>
        <option value="Concluída">Concluída</option>
    </select>

    <br><br>

    <button type="submit">Salvar</button>

</form>