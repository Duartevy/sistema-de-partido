<?php

namespace App\Http\Controllers\Web;

use App\Models\Vereador;
use App\Models\Partido;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VereadorWebController extends Controller
{
    public function index()
    {
        $vereadores = Vereador::with('partido')->get();
        return view('vereadores.index', compact('vereadores'));
    }

    public function create()
    {
        $partidos = Partido::orderBy('sigla')->get();
        return view('vereadores.create', compact('partidos'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome'       => 'required|string|max:255',
            'cpf'        => ['required', 'regex:/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/'],
            'email'      => 'required|email|max:255',
            'telefone'   => ['required', 'regex:/^\(\d{2}\) \d{5}\-\d{4}$/'],
            'estado'     => 'required|string|size:2|alpha',
            'cidade'     => 'required|string|max:255',
            'partido_id' => 'required|exists:partidos,id',
            'foto'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data['estado'] = strtoupper($data['estado']);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('vereadores', 'public');
        }

        Vereador::create($data);

        return redirect()->route('vereadores.index')->with('success', 'Vereador cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $vereador = Vereador::findOrFail($id);
        $partidos = Partido::orderBy('sigla')->get();
        return view('vereadores.edit', compact('vereador', 'partidos'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nome'       => 'required|string|max:255',
            'cpf'        => ['required', 'regex:/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/'],
            'email'      => 'required|email|max:255',
            'telefone'   => ['required', 'regex:/^\(\d{2}\) \d{5}\-\d{4}$/'],
            'estado'     => 'required|string|size:2|alpha',
            'cidade'     => 'required|string|max:255',
            'partido_id' => 'required|exists:partidos,id',
            'foto'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data['estado'] = strtoupper($data['estado']);

        $vereador = Vereador::findOrFail($id);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('vereadores', 'public');
        }

        $vereador->update($data);

        return redirect()->route('vereadores.index')->with('success', 'Vereador atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $vereador = Vereador::findOrFail($id);

        if ($vereador->foto && \Storage::disk('public')->exists($vereador->foto)) {
            \Storage::disk('public')->delete($vereador->foto);
        }

        $vereador->delete();

        return redirect()->route('vereadores.index')->with('success', 'Vereador excluído com sucesso!');
    }
}
