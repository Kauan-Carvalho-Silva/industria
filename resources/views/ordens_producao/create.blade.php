<h1>Cadastrar Ordem de Produção</h1>

<form
    action="{{ route('ordens_producao.store') }}"
    method="POST"
>

    @csrf

    <label>Setor:</label>

    <select name="setor_id">

        @foreach($setores as $setor)

            <option value="{{ $setor->id }}">
                {{ $setor->nome }}
            </option>

        @endforeach

    </select>

    <br><br>

    <label>Responsável:</label>

    <select name="responsavel_id">

        @foreach($funcionarios as $funcionario)

            <option value="{{ $funcionario->id }}">
                {{ $funcionario->nome }}
            </option>

        @endforeach

    </select>

    <br><br>

    <label>Código da ordem:</label>

    <input type="text" name="codigo_ordem">

    <br><br>

    <label>Produto:</label>

    <input type="text" name="produto">

    <br><br>

    <label>Quantidade planejada:</label>

    <input
        type="number"
        name="quantidade_planejada"
    >

    <br><br>

    <label>Quantidade produzida:</label>

    <input
        type="number"
        name="quantidade_produzida"
    >

    <br><br>

    <label>Data de início:</label>

    <input
        type="datetime-local"
        name="data_inicio"
    >

    <br><br>

    <label>Data de fim:</label>

    <input
        type="datetime-local"
        name="data_fim"
    >

    <br><br>

    <label>Status:</label>

    <select name="status">

        <option value="Aberta">
            Aberta
        </option>

        <option value="Em produção">
            Em produção
        </option>

        <option value="Finalizada">
            Finalizada
        </option>

    </select>

    <br><br>

    <label>Observações:</label>

    <textarea name="observacoes"></textarea>

    <br><br>

    <button type="submit">
        Salvar
    </button>

</form>