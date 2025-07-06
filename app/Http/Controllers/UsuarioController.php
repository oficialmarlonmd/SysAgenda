<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // Só usuários logados podem acessar este controller
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Listar usuários
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    // Formulário de criação
    public function create()
    {
        return view('usuarios.create');
    }

    // Salvar novo usuário
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sexo' => 'required|string|max:10',
            'data_nascimento' => 'required|date',
        ]);

        Usuario::create($request->all());

        // Corrigido 'route' e nome da rota para 'usuarios.index'
        return redirect()->route('usuarios.index')->with('success', 'Usuário criado com sucesso!');
    }

    // Formulário para editar usuário
    public function edit(Usuario $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    // Atualizar usuário
    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sexo' => 'required|string|max:10',
            'data_nascimento' => 'required|date',
        ]);

        $usuario->update($request->all());

        return redirect()->route('usuarios.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    // Deletar usuário
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuário deletado com sucesso!');
    }
}
