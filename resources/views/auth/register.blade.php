@extends('layouts.guest')

@section('title', 'Daftar')

@section('content')
<section class="relative min-h-screen flex flex-col justify-center pt-24 pb-16 px-4 sm:px-6 lg:px-8 overflow-hidden" aria-labelledby="register-heading">
    <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-slate-950 to-slate-900"></div>
    <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-amber-500/10 rounded-full blur-3xl" aria-hidden="true"></div>
    <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-indigo-500/10 rounded-full blur-3xl" aria-hidden="true"></div>

    <div class="relative max-w-md w-full mx-auto">
        <header class="text-center mb-8">
            <p class="text-amber-400 font-medium tracking-wide uppercase text-sm mb-2">Bergabung sekarang</p>
            <h1 id="register-heading" class="text-3xl sm:text-4xl font-bold text-white">
                Buat akun baru
            </h1>
        </header>

        <x-auth.card>
            <form class="space-y-6" action="{{ route('register') }}" method="POST" aria-label="Form pendaftaran">
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
                        id="name"
                        name="name"
                        label="Nama"
                        autocomplete="name"
                        placeholder="Nama lengkap"
                        :error="$errors->first('name')"
                        value="{{ old('name') }}"
                    />

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
                        autocomplete="new-password"
                        placeholder="••••••••"
                        :error="$errors->first('password')"
                    />

                    <x-ui.input
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        label="Konfirmasi Password"
                        autocomplete="new-password"
                        placeholder="Ulangi password"
                    />
                </div>

                <x-ui.button type="submit" class="w-full">
                    Daftar
                </x-ui.button>
            </form>

            <p class="mt-6 text-center text-sm text-slate-400">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="font-medium text-amber-400 hover:text-amber-300 transition-colors">
                    Masuk
                </a>
            </p>
        </x-auth.card>
    </div>
</section>
@endsection
