@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-6">
    <h2 class="text-xl font-bold mb-4">Editar Telefone</h2>

    <form action="{{ route('telefones.update', $telefone->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="numero" class="block font-semibold">Número</label>
            <input type="text" name="numero" id="numero" value="{{ old('numero', $telefone->numero) }}" class="w-full border border-gray-300 rounded px-3 py-2" required>
        </div>

        <div class="flex items-center">
            <input type="checkbox" name="principal" id="principal" value="1" {{ old('principal', $telefone->principal) ? 'checked' : '' }} class="mr-2">
            <label for="principal" class="font-semibold">Telefone Principal</label>
        </div>

        <div>
            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Atualizar</button>
            <a href="{{ route('usuarios.telefones.index', ['usuario' => $telefone->usuario_id]) }}" class="ml-4 text-gray-600 hover:underline">Cancelar</a>
    </form>
</div>
@endsection