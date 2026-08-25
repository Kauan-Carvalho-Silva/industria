@extends('layouts.app')

@section('content')

    <div class="p-4">

        <h1>Chamados de Manutenção</h1>

        @foreach ($chamados as $chamado)
            <p>{{ $chamado->titulo }}</p>
        @endforeach

        <a href="{{ route('chamados.create') }}">
            Novo Chamado
        </a>

    </div>

@endsection