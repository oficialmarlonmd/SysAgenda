@php
    $isEdit = isset($telefone);
    $formAction = $isEdit ? route('telefones.update', $telefone->id) : route('usuarios.telefones.store', $usuario_id);
    $cancelRoute = $isEdit ? route('telefones.index', ['usuario' => $telefone->usuario_id]) : route('telefones.index', ['usuario' => $usuario_id]);
    $numeroValue = old('numero', $isEdit ? $telefone->numero : '');
    $principalChecked = old('principal', $isEdit ? $telefone->principal : false);
@endphp

@extends('layouts.app')

@section('title', $isEdit ? 'Editar Telefone' : 'Novo Telefone')

@section('content')
<h1 class="text-2xl font-bold mb-6">{{ $isEdit ? 'Editar Telefone' : 'Novo Telefone' }}</h1>

<form action="{{ $formAction }}" method="POST" class="max-w-md space-y-4 bg-white p-6 rounded shadow">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif

    <div>
        <label for="numero" class="block font-semibold mb-1">Número</label>
        <input type="text" name="numero" id="numero" required
               value="{{ $numeroValue }}"
               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
    </div>

    <div class="flex items-center">
        <input type="checkbox" name="principal" id="principal" value="1"
               {{ $principalChecked ? 'checked' : '' }}
               class="mr-2" />
        <label for="principal" class="font-semibold">Telefone Principal</label>
    </div>

    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
        {{ $isEdit ? 'Atualizar' : 'Cadastrar' }}
    </button>
    <a href="{{ $cancelRoute }}" class="ml-4 text-gray-600 hover:underline">Cancelar</a>
</form>
@endsection