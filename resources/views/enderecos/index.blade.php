@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Endereços da Pessoa #{{ $usuario->id }}</h1>

    <a href="{{ route('usuarios.enderecos.create', $usuario) }}" class="mb-4 inline-block bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">
    + Novo Endereço
    </a>

    <table class="w-full table-auto border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">CEP</th>
                <th class="border px-4 py-2">Logradouro</th>
                <th class="border px-4 py-2">Número</th>
                <th class="border px-4 py-2">Complemento</th>
                <th class="border px-4 py-2">Cidade</th>
                <th class="border px-4 py-2">Principal</th>
                <th class="border px-4 py-2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($enderecos as $endereco)
                <tr>
                    <td class="border px-4 py-2">{{ $endereco->id }}</td>
                    <td class="border px-4 py-2">{{ $endereco->cep }}</td>
                    <td class="border px-4 py-2">{{ $endereco->logradouro }}</td>
                    <td class="border px-4 py-2">{{ $endereco->numero }}</td>
                    <td class="border px-4 py-2">{{ $endereco->complemento ?? 'N/A' }}</td>
                    <td class="border px-4 py-2">{{ $endereco->cidade }}</td>
                    <td class="border px-4 py-2">{{ $endereco->principal ? 'Sim' : 'Não' }}</td>
                    <td class="border px-4 py-2 space-x-2">
                        <a href="{{ route('enderecos.edit', $endereco->id) }}" class="text-yellow-600 hover:underline">Editar</a>
                        <form action="{{ route('enderecos.destroy', $endereco->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Tem certeza que deseja excluir este endereço?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center py-4 text-gray-500">Nenhum endereço encontrado para este usuário.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-6">
        <a href="{{ route('usuarios.index') }}" class="text-gray-600 hover:underline">Voltar para a Lista de Usuários</a>
    </div>
</div>
@endsection