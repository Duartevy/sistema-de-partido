<?php

namespace App\Http\Controllers;

use App\Models\Vereador;
use App\Http\Requests\VereadorRequest;
use Illuminate\Support\Facades\Storage;

class VereadorController extends Controller
{
    public function index()
    {
        return response()->json(Vereador::with('partido')->get());
    }

    public function store(VereadorRequest $request)
    {
        $dados = $request->validated();

        if ($request->hasFile('foto')) {
            $dados['foto'] = $request->file('foto')->store('vereadores', 'public');
        }

        $vereador = Vereador::create($dados);

        return response()->json($vereador, 201);
    }

    public function show($id)
    {
        $vereador = Vereador::with('partido')->findOrFail($id);
        return response()->json($vereador);
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

        return response()->json($vereador);
    }

    public function destroy($id)
    {
        $vereador = Vereador::findOrFail($id);

        if ($vereador->foto) {
            Storage::disk('public')->delete($vereador->foto);
        }

        $vereador->delete();

        return response()->json(['mensagem' => 'Vereador removido com sucesso.']);
    }
}
