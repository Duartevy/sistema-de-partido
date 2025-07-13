<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Partido;
use Illuminate\Http\Request;

class PartidoWebController extends Controller
{
    public function index()
    {
        $partidos = Partido::all();
        return view('partidos.index', compact('partidos'));
    }

    public function create()
    {
        return view('partidos.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'sigla' => 'required|string|max:10',
            'nome' => 'required|string|max:255',
            'imagem' => 'nullable|image'
        ]);

        if ($request->hasFile('imagem')) {
            $data['imagem'] = $request->file('imagem')->store('partidos', 'public');
        }

        Partido::create($data);
        return redirect()->route('partidos.index')->with('success', 'Partido criado com sucesso!');
    }

    public function edit($id)
    {
        $partido = Partido::findOrFail($id);
        return view('partidos.edit', compact('partido'));
    }

    public function update(Request $request, $id)
    {
        $partido = Partido::findOrFail($id);

        $data = $request->validate([
            'sigla' => 'required|string|max:10',
            'nome' => 'required|string|max:255',
            'imagem' => 'nullable|image'
        ]);

        if ($request->hasFile('imagem')) {
            if ($partido->imagem) {
                \Storage::disk('public')->delete($partido->imagem);
            }
            $data['imagem'] = $request->file('imagem')->store('partidos', 'public');
        }

        $partido->update($data);
        return redirect()->route('partidos.index')->with('success', 'Partido atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $partido = Partido::findOrFail($id);
        if ($partido->imagem) {
            \Storage::disk('public')->delete($partido->imagem);
        }
        $partido->delete();

        return redirect()->route('partidos.index')->with('success', 'Partido removido com sucesso!');
    }
}
