<h1>Detalhes da Ordem de Produção</h1>

<p>
    <strong>ID:</strong>
    {{ $ordens_producao->id }}
</p>

<p>
    <strong>Setor:</strong>
    {{ $ordens_producao->setor_id }}
</p>

<p>
    <strong>Responsável:</strong>
    {{ $ordens_producao->responsavel_id }}
</p>

<p>
    <strong>Código:</strong>
    {{ $ordens_producao->codigo_ordem }}
</p>

<p>
    <strong>Produto:</strong>
    {{ $ordens_producao->produto }}
</p>

<p>
    <strong>Quantidade planejada:</strong>
    {{ $ordens_producao->quantidade_planejada }}
</p>

<p>
    <strong>Quantidade produzida:</strong>
    {{ $ordens_producao->quantidade_produzida }}
</p>

<p>
    <strong>Data de início:</strong>
    {{ $ordens_producao->data_inicio }}
</p>

<p>
    <strong>Data de fim:</strong>
    {{ $ordens_producao->data_fim }}
</p>

<p>
    <strong>Status:</strong>
    {{ $ordens_producao->status }}
</p>

<p>
    <strong>Observações:</strong>
    {{ $ordens_producao->observacoes }}
</p>

<a href="{{ route('ordens_producao.index') }}">
    Voltar
</a>