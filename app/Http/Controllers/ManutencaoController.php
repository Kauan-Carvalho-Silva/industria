<?php

namespace App\Http\Controllers;

use App\Models\Manutencao;
use App\Models\Equipamento;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class ManutencaoController extends Controller
{
    public function index()
    {
        $manutencoes = Manutencao::all();

        return view('manutencoes.index', compact('manutencoes'));
    }

    public function create()
    {
        $equipamentos = Equipamento::all();
        $funcionarios = Funcionario::all();

        return view('manutencoes.create', compact(
            'equipamentos',
            'funcionarios'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'equipamento_id' => 'required',
            'funcionario_id' => 'required',
            'tipo' => 'required',
            'descricao' => 'required',
            'data_manutencao' => 'required',
            'proxima_manutencao' => 'nullable',
            'custo' => 'nullable|numeric',
            'status' => 'required'
        ]);

        Manutencao::create($request->all());

        return redirect()->route('manutencoes.index');
    }

    public function show(Manutencao $manutencao)
    {
        return view('manutencoes.show', compact('manutencao'));
    }

   public function edit(Manutencao $manutencao)
{
    $equipamentos = Equipamento::all();
    $funcionarios = Funcionario::all();

    return view(
        'manutencoes.edit',
        compact(
            'manutencao',
            'equipamentos',
            'funcionarios'
        )
    );
}

    public function update(Request $request, Manutencao $manutencao)
    {
        $request->validate([
            'equipamento_id' => 'required',
            'funcionario_id' => 'required',
            'tipo' => 'required',
            'descricao' => 'required',
            'data_manutencao' => 'required',
            'proxima_manutencao' => 'nullable',
            'custo' => 'nullable|numeric',
            'status' => 'required'
        ]);

        $manutencao->update($request->all());

        return redirect()->route('manutencoes.index');
    }

    public function destroy(Manutencao $manutencao)
    {
        $manutencao->delete();

        return redirect()->route('manutencoes.index');
    }
}