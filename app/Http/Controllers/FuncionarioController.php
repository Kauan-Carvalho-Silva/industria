<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;
use App\Models\Setor;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $funcionarios = Funcionario::all();
        return view('funcionarios.index', compact('funcionarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $setores = Setor::all();
        return view('funcionarios.create', compact('setores'));
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $funcionario = Funcionario::findOrFail($id);
        return view('funcionarios.edit', compact('funcionario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => 'required',
            'matricula' => 'required|unique:funcionarios,matricula,' . $id,
            'cargo' => 'required',
            'setor_id' => 'required',
        ]);

        $funcionario = Funcionario::findOrFail($id);
        $funcionario->update($request->all());

        return redirect()->route('funcionarios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Funcionario $funcionario)
{
    $funcionario->delete();

    return redirect()->route('funcionarios.index');
}
}
