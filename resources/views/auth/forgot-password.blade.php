@extends('layouts.guest')

@section('title', 'Lupa Password')

@section('content')
<section class="relative min-h-screen flex flex-col justify-center pt-24 pb-16 px-4 sm:px-6 lg:px-8 overflow-hidden" aria-labelledby="forgot-password-heading">
    <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-slate-950 to-slate-900"></div>
    <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-amber-500/10 rounded-full blur-3xl" aria-hidden="true"></div>
    <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-indigo-500/10 rounded-full blur-3xl" aria-hidden="true"></div>

    <div class="relative max-w-md w-full mx-auto">
        <header class="text-center mb-8">
            <p class="text-amber-400 font-medium tracking-wide uppercase text-sm mb-2">Reset password</p>
            <h1 id="forgot-password-heading" class="text-3xl sm:text-4xl font-bold text-white">
                Lupa password Anda?
            </h1>
            <p class="mt-3 text-sm text-slate-400">
                Masukkan email Anda dan kami akan mengirimkan link untuk reset password.
            </p>
        </header>

        <x-auth.card>
            <form class="space-y-6" action="{{ route('password.email') }}" method="POST">
                @csrf

                @if (session('status'))
                    <x-ui.alert type="success">
                        {{ session('status') }}
                    </x-ui.alert>
                @endif

                @if ($errors->any())
                    <x-ui.alert type="error" title="Terdapat kesalahan:">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </x-ui.alert>
                @endif

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

                <x-ui.button type="submit" class="w-full">
                    Kirim Link Reset Password
                </x-ui.button>

                <p class="text-center text-sm text-slate-400">
                    <a href="{{ route('login') }}" class="font-medium text-amber-400 hover:text-amber-300 transition-colors">
                        Kembali ke halaman login
                    </a>
                </p>
            </form>
        </x-auth.card>
    </div>
</section>
@endsection
