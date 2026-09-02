<?php

namespace App\Http\Controllers;

use App\Models\OrdemProducao;
use App\Models\Setor;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class OrdemProducaoController extends Controller
{
    public function index()
    {
        $ordens = OrdemProducao::all();

        return view('ordens_producao.index', compact('ordens'));
    }

    public function create()
    {
        $setores = Setor::all();
        $funcionarios = Funcionario::all();

        return view('ordens_producao.create', compact(
            'setores',
            'funcionarios'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'setor_id' => 'required',
            'responsavel_id' => 'required',
            'codigo_ordem' => 'required|max:30',
            'produto' => 'required|max:100',
            'quantidade_planejada' => 'required|integer',
            'quantidade_produzida' => 'required|integer',
            'data_inicio' => 'required',
            'data_fim' => 'nullable',
            'status' => 'required',
            'observacoes' => 'nullable'
        ]);

        OrdemProducao::create($request->all());

        return redirect()->route('ordens_producao.index');
    }

    public function show(OrdemProducao $ordens_producao)
    {
        return view(
            'ordens_producao.show',
            compact('ordens_producao')
        );
    }

    public function edit(OrdemProducao $ordens_producao)
    {
        $setores = Setor::all();
        $funcionarios = Funcionario::all();

        return view(
            'ordens_producao.edit',
            compact(
                'ordens_producao',
                'setores',
                'funcionarios'
            )
        );
    }

    public function update(
        Request $request,
        OrdemProducao $ordens_producao
    ) {
        $request->validate([
            'setor_id' => 'required',
            'responsavel_id' => 'required',
            'codigo_ordem' => 'required|max:30',
            'produto' => 'required|max:100',
            'quantidade_planejada' => 'required|integer',
            'quantidade_produzida' => 'required|integer',
            'data_inicio' => 'required',
            'data_fim' => 'nullable',
            'status' => 'required',
            'observacoes' => 'nullable'
        ]);

        $ordens_producao->update($request->all());

        return redirect()->route('ordens_producao.index');
    }

    public function destroy(OrdemProducao $ordens_producao)
    {
        $ordens_producao->delete();

        return redirect()->route('ordens_producao.index');
    }
}