<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;
use App\Models\Setor;

class FuncionarioController extends Controller
{
    public function index(Request $request)
    {
        $funcionarios = Funcionario::where('id', '>', 0);

        if ($request->filled('nome')) {
            $funcionarios = $funcionarios->where(
                'nome',
                'like',
                '%' . $request->nome . '%'
            );
        }

        if ($request->filled('cargo')) {
            $funcionarios = $funcionarios->where(
                'cargo',
                $request->cargo
            );
        }

        if ($request->filled('setor_id')) {
            $funcionarios = $funcionarios->where(
                'setor_id',
                $request->setor_id
            );
        }

        if ($request->filled('matricula')) {
            $funcionarios = $funcionarios->where(
                'matricula',
                'like',
                '%' . $request->matricula . '%'
            );
        }

        $funcionarios = $funcionarios->get();

        $setores = Setor::all();

        $setorSelecionado = $request->filled('setor_id')
            ? Setor::find($request->setor_id)
            : null;

        return view(
            'funcionarios.index',
            compact(
                'funcionarios',
                'setores',
                'setorSelecionado'
            )
        );
    }

    public function create()
    {
        $setores = Setor::all();

        return view(
            'funcionarios.create',
            compact('setores')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'matricula' => 'required|unique:funcionarios,matricula',
            'cargo' => 'required',
            'setor_id' => 'required',
        ]);

        Funcionario::create($request->all());

        return redirect()->route('funcionarios.index');
    }

    public function show(Funcionario $funcionario)
    {
        //
    }

    public function edit(Funcionario $funcionario)
    {
        $setores = Setor::all();

        return view(
            'funcionarios.edit',
            compact('funcionario', 'setores')
        );
    }

    public function update(Request $request, Funcionario $funcionario)
    {
        $request->validate([
            'nome' => 'required',
            'matricula' => 'required|unique:funcionarios,matricula,' . $funcionario->id,
            'cargo' => 'required',
            'setor_id' => 'required',
        ]);

        $funcionario->update($request->all());

        return redirect()->route('funcionarios.index');
    }

    public function destroy(Funcionario $funcionario)
    {
        $funcionario->delete();

        return redirect()->route('funcionarios.index');
    }
}