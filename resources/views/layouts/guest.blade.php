<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="RemindMe — Aplikasi manajemen tugas dengan penjadwalan, pemantauan, dan notifikasi.">
    <meta name="theme-color" content="#0f172a">

    <title>@yield('title', 'Masuk') — RemindMe</title>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif
</head>
<body class="antialiased bg-slate-950 text-slate-100 font-sans">
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 focus:z-50 focus:px-4 focus:py-2 focus:bg-amber-500 focus:text-slate-900 focus:rounded-lg">
        Langsung ke konten
    </a>

    <header class="fixed top-0 left-0 right-0 z-40 border-b border-slate-800/50 bg-slate-950/80 backdrop-blur-md">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center justify-between h-16" aria-label="Navigasi utama">
                <a href="{{ url('/') }}" class="text-xl font-semibold text-white tracking-tight">
                    Remind<span class="text-amber-400">Me</span>
                </a>
                <div class="flex items-center gap-3">
                    @auth
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 rounded-lg bg-amber-500 text-slate-900 font-medium hover:bg-amber-400 transition-colors">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 rounded-lg text-slate-300 hover:text-white hover:bg-slate-800 transition-colors">
                            Masuk
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 rounded-lg bg-amber-500 text-slate-900 font-medium hover:bg-amber-400 transition-colors">
                                Daftar
                            </a>
                        @endif
                    @endauth
                </div>
            </nav>
        </div>
    </header>

    <main id="main-content">
        @yield('content')
    </main>

    <footer class="border-t border-slate-800 bg-slate-900/50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-6">
            <p class="text-slate-400 text-sm">
                &copy; {{ date('Y') }} RemindMe. All rights reserved.
            </p>
            <nav class="flex items-center gap-6" aria-label="Footer">
                <a href="{{ url('/') }}" class="text-slate-400 hover:text-white text-sm transition-colors">Beranda</a>
                @auth
                    <a href="{{ route('dashboard') }}" class="text-slate-400 hover:text-white text-sm transition-colors">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-slate-400 hover:text-white text-sm transition-colors">Masuk</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-amber-400 hover:text-amber-300 text-sm font-medium transition-colors">Daftar</a>
                    @endif
                @endauth
            </nav>
        </div>
    </footer>
</body>
</html>
