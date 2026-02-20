<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="RemindMe — Aplikasi manajemen tugas dengan penjadwalan, pemantauan, dan notifikasi. Jangan lewatkan deadline lagi.">
    <meta name="theme-color" content="#0f172a">

    <title>RemindMe — Kelola Tugas, Raih Deadline</title>

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
                        <a href="{{ url('/dashboard') }}" class="inline-flex items-center px-4 py-2 rounded-lg bg-amber-500 text-slate-900 font-medium hover:bg-amber-400 transition-colors">
                            Dashboard
                        </a>
                    @else
                        <a href="" class="inline-flex items-center px-4 py-2 rounded-lg text-slate-300 hover:text-white hover:bg-slate-800 transition-colors">
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
        {{-- Section 1: Hero --}}
        <section class="relative min-h-screen flex flex-col justify-center pt-24 pb-16 px-4 sm:px-6 lg:px-8 overflow-hidden" aria-labelledby="hero-heading">
            <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-slate-950 to-slate-900"></div>
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-amber-500/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-indigo-500/10 rounded-full blur-3xl"></div>

            <div class="relative max-w-4xl mx-auto text-center">
                <p class="text-amber-400 font-medium tracking-wide uppercase text-sm mb-4">Manajemen Tugas yang Sederhana</p>
                <h1 id="hero-heading" class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight mb-6">
                    Jangan lewatkan
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-amber-600">deadline</span>
                    lagi.
                </h1>
                <p class="text-lg sm:text-xl text-slate-400 max-w-2xl mx-auto mb-10">
                    Jadwalkan tugas, pantau progres, dan dapatkan notifikasi tepat waktu. Satu aplikasi untuk mengatur semua.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    @auth
                        <a href="" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 rounded-xl bg-amber-500 text-slate-900 font-semibold hover:bg-amber-400 transition-all shadow-lg shadow-amber-500/25">
                            Buka Dashboard
                        </a>
                    @else
                        <a href="" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 rounded-xl bg-amber-500 text-slate-900 font-semibold hover:bg-amber-400 transition-all shadow-lg shadow-amber-500/25">
                            Daftar Gratis
                        </a>
                        <a href="" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 rounded-xl border border-slate-600 text-slate-300 hover:border-slate-500 hover:bg-slate-800/50 transition-all">
                            Masuk
                        </a>
                    @endauth
                </div>
            </div>
        </section>

        {{-- Section 2: Fitur --}}
        <section class="py-20 sm:py-28 px-4 sm:px-6 lg:px-8 bg-slate-900/50" aria-labelledby="features-heading">
            <div class="max-w-6xl mx-auto">
                <header class="text-center mb-16">
                    <h2 id="features-heading" class="text-3xl sm:text-4xl font-bold text-white mb-4">Fitur yang Anda Butuhkan</h2>
                    <p class="text-slate-400 text-lg max-w-2xl mx-auto">
                        Dari penjadwalan hingga pengingat — semuanya dalam satu tempat.
                    </p>
                </header>
                <div class="grid md:grid-cols-3 gap-8">
                    <article class="group p-6 sm:p-8 rounded-2xl bg-slate-800/50 border border-slate-700/50 hover:border-amber-500/30 transition-all">
                        <div class="w-12 h-12 rounded-xl bg-amber-500/20 flex items-center justify-center mb-5 text-amber-400 group-hover:bg-amber-500/30 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-2">Scheduling Task</h3>
                        <p class="text-slate-400">
                            Buat dan jadwalkan tugas dengan tanggal serta waktu. Atur prioritas dan kategori agar tetap terorganisir.
                        </p>
                    </article>
                    <article class="group p-6 sm:p-8 rounded-2xl bg-slate-800/50 border border-slate-700/50 hover:border-amber-500/30 transition-all">
                        <div class="w-12 h-12 rounded-xl bg-amber-500/20 flex items-center justify-center mb-5 text-amber-400 group-hover:bg-amber-500/30 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-2">Monitoring Task</h3>
                        <p class="text-slate-400">
                            Pantau semua tugas dalam satu dashboard. Lihat status, progres, dan tenggat waktu dengan jelas.
                        </p>
                    </article>
                    <article class="group p-6 sm:p-8 rounded-2xl bg-slate-800/50 border border-slate-700/50 hover:border-amber-500/30 transition-all">
                        <div class="w-12 h-12 rounded-xl bg-amber-500/20 flex items-center justify-center mb-5 text-amber-400 group-hover:bg-amber-500/30 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-2">Push Notif Due Task</h3>
                        <p class="text-slate-400">
                            Dapatkan notifikasi sebelum tugas jatuh tempo. Tidak ada lagi deadline yang terlewat.
                        </p>
                    </article>
                </div>
            </div>
        </section>

        {{-- Section 3: Teknologi --}}
        <section class="py-20 sm:py-28 px-4 sm:px-6 lg:px-8" aria-labelledby="tech-heading">
            <div class="max-w-6xl mx-auto">
                <header class="text-center mb-16">
                    <h2 id="tech-heading" class="text-3xl sm:text-4xl font-bold text-white mb-4">Dibangun dengan Teknologi Modern</h2>
                    <p class="text-slate-400 text-lg max-w-2xl mx-auto">
                        Stack yang andal dan nyaman untuk pengembangan serta pengalaman pengguna.
                    </p>
                </header>
                <div class="flex flex-wrap justify-center gap-6 sm:gap-8">
                    <div class="flex items-center gap-3 px-5 py-3 rounded-xl bg-slate-800/70 border border-slate-700/50">
                        <span class="text-2xl font-bold text-red-500">Laravel</span>
                        <span class="text-slate-400 text-sm">PHP Framework</span>
                    </div>
                    <div class="flex items-center gap-3 px-5 py-3 rounded-xl bg-slate-800/70 border border-slate-700/50">
                        <span class="text-2xl font-bold text-cyan-400">Tailwind CSS</span>
                        <span class="text-slate-400 text-sm">Styling</span>
                    </div>
                    <div class="flex items-center gap-3 px-5 py-3 rounded-xl bg-slate-800/70 border border-slate-700/50">
                        <span class="text-2xl font-bold text-amber-400">Blade</span>
                        <span class="text-slate-400 text-sm">Templating</span>
                    </div>
                    <div class="flex items-center gap-3 px-5 py-3 rounded-xl bg-slate-800/70 border border-slate-700/50">
                        <span class="text-2xl font-bold text-blue-400">Vite</span>
                        <span class="text-slate-400 text-sm">Build Tool</span>
                    </div>
                </div>
            </div>
        </section>

        {{-- Section 4: Footer --}}
        <footer class="border-t border-slate-800 bg-slate-900/50 py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-6xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-6">
                <p class="text-slate-400 text-sm">
                    &copy; {{ date('Y') }} RemindMe. All rights reserved.
                </p>
                <nav class="flex items-center gap-6" aria-label="Footer">
                    <a href="{{ url('/') }}" class="text-slate-400 hover:text-white text-sm transition-colors">Beranda</a>
                    @auth
                        <a href="" class="text-slate-400 hover:text-white text-sm transition-colors">Dashboard</a>
                    @else
                        <a href="" class="text-slate-400 hover:text-white text-sm transition-colors">Masuk</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-amber-400 hover:text-amber-300 text-sm font-medium transition-colors">Daftar</a>
                        @endif
                    @endauth
                </nav>
            </div>
        </footer>
    </main>
</body>
</html>
