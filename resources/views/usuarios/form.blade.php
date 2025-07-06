@php
    $isEdit = isset($usuario);
@endphp

@extends('layouts.app')

@section('title', $isEdit ? 'Editar Usuário' : 'Novo Usuário')

@section('content')
<h1 class="text-2xl font-bold mb-6">{{ $isEdit ? 'Editar Usuário' : 'Novo Usuário' }}</h1>

<form action="{{ $isEdit ? route('usuarios.update', $usuario->id) : route('usuarios.store') }}" method="POST" class="max-w-md space-y-4 bg-white p-6 rounded shadow">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif

    <div>
        <label for="name" class="block font-semibold mb-1">Nome</label>
        <input type="text" name="name" id="name" required
               value="{{ old('name', $isEdit ? $usuario->name : '') }}"
               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
    </div>

    <div>
        <label for="sexo" class="block font-semibold mb-1">Sexo</label>
        <select name="sexo" id="sexo" required
                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            <option value="">Selecione</option>
            <option value="Masculino" {{ old('sexo', $isEdit ? $usuario->sexo : '') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
            <option value="Feminino" {{ old('sexo', $isEdit ? $usuario->sexo : '') == 'Feminino' ? 'selected' : '' }}>Feminino</option>
            <option value="Outro" {{ old('sexo', $isEdit ? $usuario->sexo : '') == 'Outro' ? 'selected' : '' }}>Outro</option>
        </select>
    </div>

    <div>
        <label for="data_nascimento" class="block font-semibold mb-1">Data de Nascimento</label>
        <input type="date" name="data_nascimento" id="data_nascimento" required
               value="{{ old('data_nascimento', $isEdit ? $usuario->data_nascimento->format('Y-m-d') : '') }}"
               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
    </div>

    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
        {{ $isEdit ? 'Atualizar' : 'Cadastrar' }}
    </button>
</form>
@endsection
