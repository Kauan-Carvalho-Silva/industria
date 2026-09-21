<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipamento;
use App\Models\Setor;

class EquipamentoController extends Controller
{
    public function index(Request $request)
    {
        $equipamentos = Equipamento::where('id', '>', 0);

        if ($request->filled('nome')) {
            $equipamentos = $equipamentos->where(
                'nome',
                'like',
                '%' . $request->nome . '%'
            );
        }

        if ($request->filled('status')) {
            $equipamentos = $equipamentos->where(
                'status',
                $request->status
            );
        }

        if ($request->filled('setor_id')) {
            $equipamentos = $equipamentos->where(
                'setor_id',
                $request->setor_id
            );
        }

        if ($request->filled('patrimonio')) {
            $equipamentos = $equipamentos->where(
                'patrimonio',
                'like',
                '%' . $request->patrimonio . '%'
            );
        }

        $equipamentos = $equipamentos->get();

        $setores = Setor::all();

        $setorSelecionado = $request->filled('setor_id')
            ? Setor::find($request->setor_id)
            : null;

        return view(
            'equipamentos.index',
            compact(
                'equipamentos',
                'setores',
                'setorSelecionado'
            )
        );
    }

    public function create()
    {
        $setores = Setor::all();

        return view(
            'equipamentos.create',
            compact('setores')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'patrimonio' => 'required|unique:equipamentos,patrimonio',
            'setor_id' => 'required',
            'status' => 'required',
        ]);

        Equipamento::create($request->all());

        return redirect()->route('equipamentos.index');
    }

    public function show(Equipamento $equipamento)
    {
        //
    }

    public function edit(Equipamento $equipamento)
    {
        $setores = Setor::all();

        return view(
            'equipamentos.edit',
            compact('equipamento', 'setores')
        );
    }

    public function update(Request $request, Equipamento $equipamento)
    {
        $request->validate([
            'nome' => 'required',
            'patrimonio' => 'required|unique:equipamentos,patrimonio,' . $equipamento->id,
            'setor_id' => 'required',
            'status' => 'required',
        ]);

        $equipamento->update($request->all());

        return redirect()->route('equipamentos.index');
    }

    public function destroy(Equipamento $equipamento)
    {
        $equipamento->delete();

        return redirect()->route('equipamentos.index');
    }
}