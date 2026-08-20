<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use App\Models\Setor;
use Illuminate\Http\Request;

class EquipamentoController extends Controller
{
    public function index()
    {
        $equipamentos = Equipamento::all();

        return view('equipamentos.index', compact('equipamentos'));
    }

    public function create()
    {
        $setores = Setor::all();

        return view('equipamentos.create', compact('setores'));
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

        return view('equipamentos.edit', compact('equipamento', 'setores'));
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