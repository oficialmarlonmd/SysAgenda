<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\Usuario; // Certifique-se de que este modelo está sendo usado
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    // Listar endereços de um usuário
    public function index(Usuario $usuario) // Alterado para Usuario $usuario para model binding
    {
        $enderecos = $usuario->enderecos; // Assumindo que você terá um relacionamento hasMany em Usuario
        return view('enderecos.index', compact('enderecos', 'usuario')); // Passa a instância do usuario
    }

    // Formulário de criação de endereço
    public function create(Usuario $usuario) // Alterado para Usuario $usuario
    {
        return view('enderecos.create', compact('usuario')); // Passa a instância do usuario
    }

    // Salvar novo endereço para o usuário
    public function store(Request $request, Usuario $usuario) // Alterado para Usuario $usuario
    {
        $request->validate([
            'cep' => 'required|string',
            'logradouro' => 'required|string',
            'numero' => 'required|string',
            'complemento' => 'nullable|string',
            'cidade' => 'required|string',
            'principal' => 'boolean'
        ]);

        // Se for principal, remover principal anterior
        if ($request->principal) {
            Endereco::where('usuario_id', $usuario->id)->update(['principal' => false]);
        }

        $endereco = Endereco::create([
            'usuario_id' => $usuario->id, // Usa $usuario->id
            'cep' => $request->cep,
            'logradouro' => $request->logradouro,
            'numero' => $request->numero,
            'complemento' => $request->complemento,
            'cidade' => $request->cidade,
            'principal' => $request->principal ?? false,
        ]);

        return redirect()->route('usuarios.enderecos.index', $usuario)->with('success', 'Endereço criado com sucesso!');
    }

    // Mostrar um endereço específico (geralmente não usado com shallow, redireciona para index)
    public function show(Endereco $endereco) // Alterado para Endereco $endereco
    {
        return redirect()->route('usuarios.enderecos.index', $endereco->usuario_id);
    }

    // Formulário para editar endereço
    public function edit(Endereco $endereco) // Alterado para Endereco $endereco
    {
        return view('enderecos.edit', compact('endereco'));
    }

    // Atualizar endereço
    public function update(Request $request, Endereco $endereco) // Alterado para Endereco $endereco
    {
        $request->validate([
            'cep' => 'sometimes|required|string',
            'logradouro' => 'sometimes|required|string',
            'numero' => 'sometimes|required|string',
            'complemento' => 'nullable|string',
            'cidade' => 'sometimes|required|string',
            'principal' => 'boolean'
        ]);

        if ($request->has('principal') && $request->principal) {
            Endereco::where('usuario_id', $endereco->usuario_id)->update(['principal' => false]);
        }

        $endereco->update($request->all());

        return redirect()->route('usuarios.enderecos.index', $endereco->usuario_id)->with('success', 'Endereço atualizado com sucesso!');
    }

    // Deletar endereço
    public function destroy(Endereco $endereco) // Alterado para Endereco $endereco
    {
        $usuario_id = $endereco->usuario_id;
        $endereco->delete();

        return redirect()->route('usuarios.enderecos.index', $usuario_id)->with('success', 'Endereço removido com sucesso.');
    }
}