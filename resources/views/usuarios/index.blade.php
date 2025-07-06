@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Pessoas</h1>

    <a href="{{ route('usuarios.create') }}" class="mb-4 inline-block bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">
        + Nova Pessoa
    </a>

    <table class="w-full table-auto border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Nome</th>
                <th class="border px-4 py-2">Sexo</th>
                <th class="border px-4 py-2">Data de Nascimento</th>
                <th class="border px-4 py-2">Idade</th>
                <th class="border px-4 py-2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($usuarios as $usuario)
                <tr>
                    <td class="border px-4 py-2">{{ $usuario->id }}</td>
                    <td class="border px-4 py-2">{{ $usuario->name }}</td>
                    <td class="border px-4 py-2">{{ $usuario->sexo }}</td>
                    <td class="border px-4 py-2">{{ $usuario->data_nascimento }}</td>
                    <td class="border px-4 py-2">{{ $usuario->idade }}</td>
                    <td class="border px-4 py-2 space-x-2">
                        <a href="{{ route('usuarios.enderecos.index', $usuario) }}" class="text-blue-600 hover:underline">Endereços</a>
                        <a href="{{ url('/usuarios/'.$usuario->id.'/telefones') }}" class="text-blue-600 hover:underline">Telefones</a>
                        <a href="{{ route('usuarios.edit', $usuario->id) }}" class="text-yellow-600 hover:underline">Editar</a>
                        <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:underline" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-gray-500">Nenhum usuário encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
