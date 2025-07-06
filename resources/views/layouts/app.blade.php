<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Sistema')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

    <header class="bg-indigo-600 text-white p-4">
        <nav class="container mx-auto flex justify-between items-center">
            <a href="{{ route('usuarios.index') }}" class="font-bold text-lg">SysAgenda Hub</a>

            <div>
                @auth
                    <span class="mr-4">Olá, {{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="hover:underline">Sair</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="hover:underline">Login</a>
                @endauth
            </div>
        </nav>
    </header>

    <main class="container mx-auto flex-grow p-6">
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-6">{{ session('success') }}</div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-gray-200 text-center p-4 text-gray-600">
        &copy; {{ date('Y') }} Meu Sistema
    </footer>

</body>
</html>
