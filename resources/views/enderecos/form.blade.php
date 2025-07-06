@php
    $isEdit = isset($endereco);
    // Para criação, $usuario virá do create.blade.php
    // Para edição, $endereco->usuario_id já estará disponível
    $currentUsuario = $isEdit ? $endereco->usuario : $usuario; // Usar o objeto Usuario

    $formAction = $isEdit ? route('enderecos.update', $endereco->id) : route('usuarios.enderecos.store', $currentUsuario);
    $cancelRoute = route('usuarios.enderecos.index', $currentUsuario); // Passar o objeto Usuario
    
    $cepValue = old('cep', $isEdit ? $endereco->cep : '');
    $logradouroValue = old('logradouro', $isEdit ? $endereco->logradouro : '');
    $numeroValue = old('numero', $isEdit ? $endereco->numero : '');
    $complementoValue = old('complemento', $isEdit ? $endereco->complemento : '');
    $cidadeValue = old('cidade', $isEdit ? $endereco->cidade : '');
    $principalChecked = old('principal', $isEdit ? $endereco->principal : false);
@endphp

@section('title', $isEdit ? 'Editar Endereço' : 'Novo Endereço')

@section('content')
<h1 class="text-2xl font-bold mb-6">{{ $isEdit ? 'Editar Endereço' : 'Novo Endereço' }}</h1>

<form action="{{ $formAction }}" method="POST" class="max-w-md space-y-4 bg-white p-6 rounded shadow">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif

    <div>
        <label for="cep" class="block font-semibold mb-1">CEP</label>
        <input type="text" name="cep" id="cep" required
               value="{{ $cepValue }}"
               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
    </div>

    <div>
        <label for="logradouro" class="block font-semibold mb-1">Logradouro</label>
        <input type="text" name="logradouro" id="logradouro" required
               value="{{ $logradouroValue }}"
               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
    </div>

    <div>
        <label for="numero" class="block font-semibold mb-1">Número</label>
        <input type="text" name="numero" id="numero" required
               value="{{ $numeroValue }}"
               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
    </div>

    <div>
        <label for="complemento" class="block font-semibold mb-1">Complemento (Opcional)</label>
        <input type="text" name="complemento" id="complemento"
               value="{{ $complementoValue }}"
               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
    </div>

    <div>
        <label for="cidade" class="block font-semibold mb-1">Cidade</label>
        <input type="text" name="cidade" id="cidade" required
               value="{{ $cidadeValue }}"
               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
    </div>

    <div class="flex items-center">
        <input type="checkbox" name="principal" id="principal" value="1"
               {{ $principalChecked ? 'checked' : '' }}
               class="mr-2" />
        <label for="principal" class="font-semibold">Endereço Principal</label>
    </div>

    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
        {{ $isEdit ? 'Atualizar' : 'Cadastrar' }}
    </button>
    <a href="{{ $cancelRoute }}" class="ml-4 text-gray-600 hover:underline">Cancelar</a>
</form>
@endsection