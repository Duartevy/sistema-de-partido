<?php

namespace App\Http\Controllers;

use App\Models\Partido;
use App\Http\Requests\PartidoRequest;
use Illuminate\Support\Facades\Storage;

class PartidoController extends Controller
{
    public function index()
    {
        $partidos = Partido::all();

        foreach ($partidos as $partido) {
            $partido->imagem = $partido->imagem ? asset('storage/' . $partido->imagem) : null;
        }

        // Se a requisição for API (via fetch, axios, etc), retorna JSON
        if (request()->wantsJson()) {
            return response()->json($partidos);
        }

        // Se for via navegador, exibe a view com Blade
        return view('partidos.index', compact('partidos'));
    }

    public function store(PartidoRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('imagem')) {
            $data['imagem'] = $request->file('imagem')->store('partidos', 'public');
        }

        $partido = Partido::create($data);

        $partido->imagem = $partido->imagem ? asset('storage/' . $partido->imagem) : null;

        // Redireciona com sucesso se for formulário Blade
        if (!request()->wantsJson()) {
            return redirect()->route('partidos.index')->with('success', 'Partido cadastrado com sucesso!');
        }

        // Se for API
        return response()->json($partido, 201);
    }

    public function show($id)
    {
        $partido = Partido::findOrFail($id);
        $partido->imagem = $partido->imagem ? asset('storage/' . $partido->imagem) : null;

        return response()->json($partido);
    }

    public function update(PartidoRequest $request, $id)
    {
        $partido = Partido::findOrFail($id);
        $data = $request->validated();

        if ($request->hasFile('imagem')) {
            if ($partido->imagem) {
                Storage::disk('public')->delete($partido->imagem);
            }

            $data['imagem'] = $request->file('imagem')->store('partidos', 'public');
        }

        $partido->update($data);

        $partido->imagem = $partido->imagem ? asset('storage/' . $partido->imagem) : null;

        // Redireciona com sucesso se for formulário Blade
        if (!request()->wantsJson()) {
            return redirect()->route('partidos.index')->with('success', 'Partido atualizado com sucesso!');
        }

        return response()->json($partido);
    }

    public function destroy($id)
    {
        $partido = Partido::findOrFail($id);

        if ($partido->imagem) {
            Storage::disk('public')->delete($partido->imagem);
        }

        $partido->delete();

        // Redireciona se vier do navegador
        if (!request()->wantsJson()) {
            return redirect()->route('partidos.index')->with('success', 'Partido excluído com sucesso!');
        }

        return response()->json(['mensagem' => 'Partido deletado com sucesso.']);
    }

    public function create()
    {
        return view('partidos.create');
    }

    public function edit($id)
    {
        $partido = Partido::findOrFail($id);
        return view('partidos.edit', compact('partido'));
    }
}
