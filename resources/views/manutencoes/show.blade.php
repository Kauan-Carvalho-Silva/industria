<h1>Detalhes da Manutenção</h1>

<p>ID: {{ $manutencao->id }}</p>

<p>Equipamento: {{ $manutencao->equipamento_id }}</p>

<p>Funcionário: {{ $manutencao->funcionario_id }}</p>

<p>Tipo: {{ $manutencao->tipo }}</p>

<p>Descrição: {{ $manutencao->descricao }}</p>

<p>Data: {{ $manutencao->data_manutencao }}</p>

<p>Próxima manutenção: {{ $manutencao->proxima_manutencao }}</p>

<p>Custo: {{ $manutencao->custo }}</p>

<p>Status: {{ $manutencao->status }}</p>

<a href="{{ route('manutencoes.index') }}">
    Voltar
</a>