<?php

namespace App\Http\Controllers;

use App\Models\tarefas;
use App\Models\usuario;
use Illuminate\Http\Request;

class TarefasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tarefas = tarefas::with('usuario')->get();

        return view('tarefas.index', compact('tarefas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function criar()
    {
        return view('tarefas.criar');
    }

    public function create()
    {
        $usuarios = usuario::all();

        return view('tarefas.create', compact('usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'usuario_id' => 'required|exists:usuarios,id',
        'descricao' => 'required|string|max:255',
        'nome_setor' => 'required|string|max:100',
        'prioridade' => 'required|in:baixa,media,alta',
        'data_cadastro' => 'nullable|date',
        'status' => 'required|in:a fazer,fazendo,pronto',
    ]);

    tarefas::create([
        'usuario_id' => $request->usuario_id,
        'id_usuario' => $request->usuario_id,
        'descricao' => $request->descricao,
        'nome_setor' => $request->nome_setor,
        'prioridade' => $request->prioridade,
        'data_cadastro' => $request->data_cadastro
            ? str_replace('T', ' ', $request->data_cadastro)
            : now(),
        'status' => $request->status,
    ]);

    return redirect()->route('tarefas.index');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tarefa = tarefas::with('usuario')->find($id);

        return view('tarefas.show', compact('tarefa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tarefa = tarefas::find($id);

        $usuarios = usuario::all();

        return view('tarefas.edit', compact('tarefa', 'usuarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'descricao' => 'required|string|max:255',
            'nome_setor' => 'required|string|max:100',
            'prioridade' => 'required|in:baixa,media,alta',
            'data_cadastro' => 'nullable|date',
            'status' => 'required|in:a fazer,fazendo,pronto',
        ]);

        $tarefa = tarefas::find($id);

        $tarefa->update([
            'usuario_id' => $request->usuario_id,

            'id_usuario' => $request->usuario_id,

            'descricao' => $request->descricao,

            'nome_setor' => $request->nome_setor,

            'prioridade' => $request->prioridade,

            'data_cadastro' => $request->data_cadastro
                ? str_replace('T', ' ', $request->data_cadastro)
                : $tarefa->data_cadastro,

            'status' => $request->status,
        ]);

        return redirect()->route('tarefas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tarefa = tarefas::find($id);

        $tarefa->delete();

        return redirect()->route('tarefas.index');
    }
}