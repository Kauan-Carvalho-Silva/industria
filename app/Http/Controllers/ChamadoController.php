<?php

namespace App\Http\Controllers;

use App\Models\ChamadoManutencao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Equipamento;

class ChamadoController extends Controller
{
    public function index()
{
    $chamados = ChamadoManutencao::where(
        'user_id',
        Auth::id()
    )->get();

    return view('chamados.index', compact('chamados'));
}

    public function create()
{
    $equipamentos = Equipamento::all();

    return view('chamados.create', compact('equipamentos'));
}
public function store(Request $request)
{
    $dados = $request->validate([
        'titulo' => 'required|max:150',
        'equipamento_id' => 'required|exists:equipamentos,id'
    ]);

    $dados['status'] = 'aberto';
    $dados['user_id'] = Auth::id();

    ChamadoManutencao::create($dados);

    return redirect()->route('chamados.index');
}

    public function show(ChamadoManutencao $chamado)
    {
        //
    }

    public function edit(ChamadoManutencao $chamado)
    {
        //
    }

    public function update(Request $request, ChamadoManutencao $chamado)
    {
        //
    }

    public function destroy(ChamadoManutencao $chamado)
    {
        //
    }
}