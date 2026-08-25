<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Novo Chamado</title>
</head>
<body>

    <h1>Novo Chamado de Manutenção</h1>

    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $erro)
                <p>{{ $erro }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('chamados.store') }}" method="POST">

        @csrf

        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo">

        <br><br>

        <label for="equipamento_id">Equipamento:</label>

<select name="equipamento_id" id="equipamento_id">

    <option value="">Selecione um equipamento</option>

    @foreach ($equipamentos as $equipamento)
        <option value="{{ $equipamento->id }}">
            {{ $equipamento->nome }}
        </option>
    @endforeach

</select>

        <br><br>

        <button type="submit">Abrir Chamado</button>

    </form>

</body>
</html>