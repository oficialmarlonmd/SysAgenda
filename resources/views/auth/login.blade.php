<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Entrar</h1>

        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block mb-1 font-semibold">E-mail</label>
                <input id="email" type="email" name="email" required autofocus
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            </div>

            <div class="mb-6">
                <label for="password" class="block mb-1 font-semibold">Senha</label>
                <input id="password" type="password" name="password" required
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            </div>

            <button type="submit"
                class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700 transition">Entrar</button>
        </form>
    </div>
</body>
</html>
