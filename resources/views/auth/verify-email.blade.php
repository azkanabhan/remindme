@extends('layouts.guest')

@section('title', 'Verifikasi Email')

@section('content')
<section class="relative min-h-screen flex flex-col justify-center pt-24 pb-16 px-4 sm:px-6 lg:px-8 overflow-hidden" aria-labelledby="verify-email-heading">
    <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-slate-950 to-slate-900"></div>
    <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-amber-500/10 rounded-full blur-3xl" aria-hidden="true"></div>
    <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-indigo-500/10 rounded-full blur-3xl" aria-hidden="true"></div>

    <div class="relative max-w-md w-full mx-auto">
        <header class="text-center mb-8">
            <p class="text-amber-400 font-medium tracking-wide uppercase text-sm mb-2">Verifikasi email</p>
            <h1 id="verify-email-heading" class="text-3xl sm:text-4xl font-bold text-white">
                Cek email Anda
            </h1>
            <p class="mt-3 text-sm text-slate-400">
                Sebelum melanjutkan, silakan verifikasi email Anda. Kami telah mengirimkan link verifikasi ke alamat email yang terdaftar.
            </p>
        </header>

        <x-auth.card>
            @if (session('status'))
                <x-ui.alert type="success">
                    {{ session('status') }}
                </x-ui.alert>
            @endif

            <div class="mt-6 space-y-6">
                <form method="POST" action="{{ route('verification.send') }}" class="space-y-4">
                    @csrf
                    <x-ui.button type="submit" class="w-full">
                        Kirim Ulang Email Verifikasi
                    </x-ui.button>
                </form>

                <form method="POST" action="{{ route('logout') }}" class="text-center">
                    @csrf
                    <button type="submit" class="text-sm font-medium text-slate-400 hover:text-amber-300 transition-colors">
                        Logout
                    </button>
                </form>
            </div>
        </x-auth.card>
    </div>
</section>
@endsection
