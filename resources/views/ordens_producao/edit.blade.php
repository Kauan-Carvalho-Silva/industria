<h1>Editar Ordem de Produção</h1>

<form
    action="{{ route('ordens_producao.update', $ordens_producao) }}"
    method="POST"
>

    @csrf
    @method('PUT')

    <label>Setor:</label>

    <select name="setor_id">

        @foreach($setores as $setor)

            <option
                value="{{ $setor->id }}"
                {{ $ordens_producao->setor_id == $setor->id ? 'selected' : '' }}
            >
                {{ $setor->nome }}
            </option>

        @endforeach

    </select>

    <br><br>

    <label>Responsável:</label>

    <select name="responsavel_id">

        @foreach($funcionarios as $funcionario)

            <option
                value="{{ $funcionario->id }}"
                {{ $ordens_producao->responsavel_id == $funcionario->id ? 'selected' : '' }}
            >
                {{ $funcionario->nome }}
            </option>

        @endforeach

    </select>

    <br><br>

    <label>Código:</label>

    <input
        type="text"
        name="codigo_ordem"
        value="{{ $ordens_producao->codigo_ordem }}"
    >

    <br><br>

    <label>Produto:</label>

    <input
        type="text"
        name="produto"
        value="{{ $ordens_producao->produto }}"
    >

    <br><br>

    <label>Quantidade planejada:</label>

    <input
        type="number"
        name="quantidade_planejada"
        value="{{ $ordens_producao->quantidade_planejada }}"
    >

    <br><br>

    <label>Quantidade produzida:</label>

    <input
        type="number"
        name="quantidade_produzida"
        value="{{ $ordens_producao->quantidade_produzida }}"
    >

    <br><br>

    <label>Data de início:</label>

    <input
        type="datetime-local"
        name="data_inicio"
        value="{{ date('Y-m-d\TH:i', strtotime($ordens_producao->data_inicio)) }}"
    >

    <br><br>

    <label>Data de fim:</label>

    <input
        type="datetime-local"
        name="data_fim"
        value="{{ $ordens_producao->data_fim ? date('Y-m-d\TH:i', strtotime($ordens_producao->data_fim)) : '' }}"
    >

    <br><br>

    <label>Status:</label>

    <select name="status">

        <option value="Aberta"
            {{ $ordens_producao->status == 'Aberta' ? 'selected' : '' }}>
            Aberta
        </option>

        <option value="Em produção"
            {{ $ordens_producao->status == 'Em produção' ? 'selected' : '' }}>
            Em produção
        </option>

        <option value="Finalizada"
            {{ $ordens_producao->status == 'Finalizada' ? 'selected' : '' }}>
            Finalizada
        </option>

    </select>

    <br><br>

    <label>Observações:</label>

    <textarea name="observacoes">{{ $ordens_producao->observacoes }}</textarea>

    <br><br>

    <button type="submit">
        Atualizar
    </button>

</form>     