@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-6">
    <h2 class="text-xl font-bold mb-4">Novo Usuário</h2>

    <form action="{{ route('usuarios.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block font-semibold">Nome</label>
            <input type="text" name="name" class="w-full border border-gray-300 rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block font-semibold">Sexo</label>
            <select name="sexo" class="w-full border border-gray-300 rounded px-3 py-2" required>
                <option value="">Selecione</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
                <option value="Outro">Outro</option>
            </select>
        </div>

        <div>
            <label class="block font-semibold">Data de Nascimento</label>
            <input type="date" name="data_nascimento" class="w-full border border-gray-300 rounded px-3 py-2" required>
        </div>

        <div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Salvar</button>
            <a href="{{ route('usuarios.index') }}" class="ml-4 text-gray-600 hover:underline">Cancelar</a>
        </div>
    </form>
</div>
@endsection
