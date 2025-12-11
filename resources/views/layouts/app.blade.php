<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gigs & Goals</title>
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;700;900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }

        .ticket-punches {
            background-image: radial-gradient(circle, transparent 7px, #1e293b 8px);
            background-size: 100% 30px;
            background-position: -10px 0;
            background-repeat: repeat-y;
        }
    </style>
</head>

<body class="bg-zinc-950 text-zinc-100 min-h-screen">
    <nav class="bg-zinc-900/80 backdrop-blur-md border-b border-zinc-800 sticky top-0 z-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center gap-2">
                    <span class="text-2xl">🏟️</span>
                    <a href="{{ url('/') }}"
                        class="font-black text-xl tracking-tighter bg-clip-text text-transparent bg-gradient-to-r from-emerald-400 to-violet-500">
                        GIGS & GOALS
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('gigs.index') }}"
                        class="text-sm font-bold text-zinc-400 hover:text-white transition-colors uppercase tracking-wider">
                        Timeline
                    </a>
                    <a href="{{ route('gigs.create') }}"
                        class="group relative px-4 py-2 rounded-full bg-zinc-800 text-sm font-bold text-white overflow-hidden transition-all hover:bg-zinc-700">
                        <span class="relative z-10 group-hover:text-emerald-400 transition-colors">+ LOG MEMORY</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="mb-4 bg-emerald-500 text-white px-4 py-2 rounded-lg shadow-md">
                {{ session('success') }}
            </div>
        @endif
        @yield('content')
    </main>

    <footer class="text-center text-slate-500 py-6 text-sm">
        <p>The soundtrack of your life meets the glory of your team.</p>
    </footer>
</body>

</html>