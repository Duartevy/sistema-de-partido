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

        // Adiciona a URL pública da imagem
        foreach ($partidos as $partido) {
            $partido->imagem = $partido->imagem ? asset('storage/' . $partido->imagem) : null;
        }

        return $partidos;
    }

    public function store(PartidoRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('imagem')) {
            $data['imagem'] = $request->file('imagem')->store('partidos', 'public');
        }

        $partido = Partido::create($data);

        // Retorna a URL completa da imagem
        $partido->imagem = $partido->imagem ? asset('storage/' . $partido->imagem) : null;

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

        return response()->json($partido);
    }

    public function destroy($id)
    {
        $partido = Partido::findOrFail($id);

        if ($partido->imagem) {
            Storage::disk('public')->delete($partido->imagem);
        }

        $partido->delete();

        return response()->json(['mensagem' => 'Partido deletado com sucesso.']);
    }
}
