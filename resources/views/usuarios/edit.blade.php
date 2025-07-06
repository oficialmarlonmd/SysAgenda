@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-6">
    <h2 class="text-xl font-bold mb-4">Editar Usuário</h2>

    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold">Nome</label>
            <input type="text" name="name" value="{{ old('name', $usuario->name) }}" class="w-full border border-gray-300 rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block font-semibold">Sexo</label>
            <select name="sexo" class="w-full border border-gray-300 rounded px-3 py-2" required>
                <option value="">Selecione</option>
                <option value="Masculino" {{ old('sexo', $usuario->sexo) == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                <option value="Feminino" {{ old('sexo', $usuario->sexo) == 'Feminino' ? 'selected' : '' }}>Feminino</option>
                <option value="Outro" {{ old('sexo', $usuario->sexo) == 'Outro' ? 'selected' : '' }}>Outro</option>
            </select>
        </div>

        <div>
            <label class="block font-semibold">Data de Nascimento</label>
            <input type="date" name="data_nascimento" value="{{ old('data_nascimento', $usuario->data_nascimento) }}" class="w-full border border-gray-300 rounded px-3 py-2" required>
        </div>

        <div>
            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Atualizar</button>
            <a href="{{ route('usuarios.index') }}" class="ml-4 text-gray-600 hover:underline">Cancelar</a>
        </div>
    </form>
</div>
@endsection
