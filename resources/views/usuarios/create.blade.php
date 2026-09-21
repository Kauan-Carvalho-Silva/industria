@extends('layouts.app')

@section('title', 'cadastro de usuario')

@section('content')

<h1>cadastro usuarios</h1>

<form action="{{ route('usuarios.store') }}"
      method="post"
      class="container mt-4">

    @csrf

    <div class="mb-3">

        <label for="nome" class="form-label">
            Nome
        </label>

        <input type="text"
               name="nome"
               id="nome"
               class="form-control"
               required>

        <label for="email" class="form-label">
            Email
        </label>

        <input type="email"
               name="email"
               id="email"
               class="form-control"
               required>

    </div>

    <button type="submit"
            class="btn btn-success">

        Salvar

    </button>

</form>

@endsection