<?php

namespace App\Http\Controllers;

use App\Models\Vereador;
use App\Models\Partido;
use App\Http\Requests\VereadorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VereadorController extends Controller
{
    public function index(Request $request)
    {
        $query = Vereador::with('partido');

        // Filtro por partido
        if ($request->filled('partido')) {
            $query->where('partido_id', $request->partido);
        }

        // Filtro por cidade
        if ($request->filled('cidade')) {
            $query->where('cidade', 'like', '%' . $request->cidade . '%');
        }

        // Filtro por nome/email
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('nome', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        $vereadores = $query->get();
        $partidos = Partido::orderBy('nome')->get(); // necessário pro filtro

        return view('vereadores.index', compact('vereadores', 'partidos'));
    }

    public function create()
    {
        $partidos = Partido::orderBy('nome')->get();
        return view('vereadores.create', compact('partidos'));
    }

    public function store(VereadorRequest $request)
    {
        $dados = $request->validated();

        if ($request->hasFile('foto')) {
            $dados['foto'] = $request->file('foto')->store('vereadores', 'public');
        }

        Vereador::create($dados);

        return redirect()->route('vereadores.index')->with('success', 'Vereador cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $vereador = Vereador::findOrFail($id);
        $partidos = Partido::orderBy('nome')->get();

        return view('vereadores.edit', compact('vereador', 'partidos'));
    }

    public function update(VereadorRequest $request, $id)
    {
        $vereador = Vereador::findOrFail($id);
        $dados = $request->validated();

        if ($request->hasFile('foto')) {
            if ($vereador->foto) {
                Storage::disk('public')->delete($vereador->foto);
            }
            $dados['foto'] = $request->file('foto')->store('vereadores', 'public');
        }

        $vereador->update($dados);

        return redirect()->route('vereadores.index')->with('success', 'Vereador atualizado com sucesso!');
    }

    public function show($id)
    {
        $vereador = Vereador::with('partido')->findOrFail($id);
        return response()->json($vereador);
    }

    public function destroy($id)
    {
        $vereador = Vereador::findOrFail($id);

        if ($vereador->foto) {
            Storage::disk('public')->delete($vereador->foto);
        }

        $vereador->delete();

        return redirect()->route('vereadores.index')->with('success', 'Vereador removido com sucesso!');
    }
}
