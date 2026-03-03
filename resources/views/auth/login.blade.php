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

        <x-auth.card>
            <form action="{{ route('login') }}" method="POST" class="space-y-6" aria-label="Form masuk">
                @csrf

                @if ($errors->any())
                    <x-ui.alert type="error" title="Terdapat kesalahan:">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </x-ui.alert>
                @endif

                <div class="space-y-4">
                    <x-ui.input
                        id="email"
                        name="email"
                        type="email"
                        label="Email"
                        autocomplete="email"
                        placeholder="nama@contoh.com"
                        :error="$errors->first('email')"
                        value="{{ old('email') }}"
                    />

                    <x-ui.input
                        id="password"
                        name="password"
                        type="password"
                        label="Password"
                        autocomplete="current-password"
                        placeholder="••••••••"
                        :error="$errors->first('password')"
                    />
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

                <x-ui.button type="submit" class="w-full">
                    Masuk
                </x-ui.button>
            </form>

            <p class="mt-6 text-center text-sm text-slate-400">
                Belum punya akun?
                <a href="{{ route('register') }}" class="font-medium text-amber-400 hover:text-amber-300 transition-colors">
                    Daftar sekarang
                </a>
            </p>
        </x-auth.card>
    </div>
</section>
@endsection
