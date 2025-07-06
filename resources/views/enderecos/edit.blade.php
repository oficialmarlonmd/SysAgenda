@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-6">
    <h2 class="text-xl font-bold mb-4">Editar Endereço</h2>

    {{-- Inclui o formulário reutilizável --}}
    @include('enderecos.form', ['endereco' => $endereco])
</div>
@endsection