<?php

namespace App\Http\Controllers;

use App\Models\Telefone;
use Illuminate\Http\Request;

class TelefoneController extends Controller
{
    // Listar telefones de um usuário específico
    public function index($usuario_id)
    {
        $telefones = Telefone::where('usuario_id', $usuario_id)->get();
        return view('telefones.index', compact('telefones', 'usuario_id'));
    }

    // Formulário de criação de telefone
    public function create($usuario_id)
    {
        return view('telefones.create', compact('usuario_id'));
    }

    // Salvar novo telefone
    public function store(Request $request, $usuario_id)
    {
        $request->validate([
            'numero' => 'required|string',
            'principal' => 'boolean'
        ]);

        if ($request->principal) {
            Telefone::where('usuario_id', $usuario_id)->update(['principal' => false]);
        }

        Telefone::create([
            'usuario_id' => $usuario_id,
            'numero' => $request->numero,
            'principal' => $request->principal ?? false
        ]);

        return redirect()->route('usuarios.telefones.index', ['usuario' => $usuario_id])->with('success', 'Telefone criado com sucesso!');
    }

    // Formulário para editar um telefone
    public function edit($id)
    {
        $telefone = Telefone::findOrFail($id);
        return view('telefones.edit', compact('telefone'));
    }

    // Atualizar telefone
    public function update(Request $request, $id)
    {
        $telefone = Telefone::findOrFail($id);

        $request->validate([
            'numero' => 'sometimes|required|string',
            'principal' => 'boolean'
        ]);

        if ($request->has('principal') && $request->principal) {
            Telefone::where('usuario_id', $telefone->usuario_id)->update(['principal' => false]);
        }

        $telefone->update($request->all());

        return redirect()->route('usuarios.telefones.index', ['usuario' => $telefone->usuario_id])->with('success', 'Telefone atualizado com sucesso!');
    }

    // Deletar telefone
    public function destroy($id)
    {
        $telefone = Telefone::findOrFail($id);
        $usuario_id = $telefone->usuario_id;
        $telefone->delete();

        return redirect()->route('usuarios.telefones.index', ['usuario' => $usuario_id])->with('success', 'Telefone removido com sucesso!');
    }
}