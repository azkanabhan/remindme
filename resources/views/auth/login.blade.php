@extends('layouts.guest')

@section('title', 'Masuk')

@section('content')
<section class="relative min-h-screen flex flex-col justify-center pt-24 pb-16 px-4 sm:px-6 lg:px-8 overflow-hidden" aria-labelledby="login-heading">
    <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-slate-950 to-slate-900"></div>
    <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-amber-500/10 rounded-full blur-3xl" aria-hidden="true"></div>
    <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-indigo-500/10 rounded-full blur-3xl" aria-hidden="true"></div>

    <div class="relative max-w-md w-full mx-auto">
        <header class="text-center mb-8">
            <p class="text-amber-400 font-medium tracking-wide uppercase text-sm mb-2">Selamat datang kembali</p>
            <h1 id="login-heading" class="text-3xl sm:text-4xl font-bold text-white">
                Masuk ke akun Anda
            </h1>
        </header>

        <article class="p-6 sm:p-8 rounded-2xl bg-slate-800/50 border border-slate-700/50 shadow-xl">
            <form action="{{ route('login') }}" method="POST" class="space-y-6" aria-label="Form masuk">
                @csrf

                @if ($errors->any())
                    <div class="p-4 rounded-xl bg-red-500/10 border border-red-500/30 text-red-400" role="alert" aria-live="polite">
                        <p class="font-medium mb-2">Terdapat kesalahan:</p>
                        <ul class="list-disc list-inside text-sm space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="space-y-4">
                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-300 mb-2">Email</label>
                        <input id="email" name="email" type="email" autocomplete="email" required
                            class="block w-full px-4 py-3 rounded-xl bg-slate-900/70 border border-slate-600 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-amber-500/50 focus:border-amber-500/50 transition-colors sm:text-sm @error('email') border-red-500/50 @enderror"
                            placeholder="nama@contoh.com" value="{{ old('email') }}">
                        @error('email')
                            <p class="mt-2 text-sm text-red-400" role="alert">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-slate-300 mb-2">Password</label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="block w-full px-4 py-3 rounded-xl bg-slate-900/70 border border-slate-600 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-amber-500/50 focus:border-amber-500/50 transition-colors sm:text-sm @error('password') border-red-500/50 @enderror"
                            placeholder="••••••••">
                        @error('password')
                            <p class="mt-2 text-sm text-red-400" role="alert">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox"
                            class="h-4 w-4 rounded border-slate-600 bg-slate-900/70 text-amber-500 focus:ring-amber-500/50">
                        <label for="remember" class="ml-2 block text-sm text-slate-400">
                            Ingat saya
                        </label>
                    </div>
                    <a href="{{ route('password.request') }}" class="text-sm font-medium text-amber-400 hover:text-amber-300 transition-colors">
                        Lupa password?
                    </a>
                </div>

                <button type="submit"
                    class="w-full inline-flex justify-center items-center px-6 py-3 rounded-xl bg-amber-500 text-slate-900 font-semibold hover:bg-amber-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-slate-900 focus:ring-amber-500 transition-all shadow-lg shadow-amber-500/25">
                    Masuk
                </button>
            </form>

            <p class="mt-6 text-center text-sm text-slate-400">
                Belum punya akun?
                <a href="{{ route('register') }}" class="font-medium text-amber-400 hover:text-amber-300 transition-colors">
                    Daftar sekarang
                </a>
            </p>
        </article>
    </div>
</section>
@endsection
