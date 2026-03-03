@extends('layouts.guest')

@section('title', 'Reset Password')

@section('content')
<section class="relative min-h-screen flex flex-col justify-center pt-24 pb-16 px-4 sm:px-6 lg:px-8 overflow-hidden" aria-labelledby="reset-password-heading">
    <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-slate-950 to-slate-900"></div>
    <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-amber-500/10 rounded-full blur-3xl" aria-hidden="true"></div>
    <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-indigo-500/10 rounded-full blur-3xl" aria-hidden="true"></div>

    <div class="relative max-w-md w-full mx-auto">
        <header class="text-center mb-8">
            <p class="text-amber-400 font-medium tracking-wide uppercase text-sm mb-2">Reset password</p>
            <h1 id="reset-password-heading" class="text-3xl sm:text-4xl font-bold text-white">
                Atur ulang password
            </h1>
        </header>

        <x-auth.card>
            <form class="space-y-6" action="{{ route('password.update') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ $email }}">

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
                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-300 mb-2">Email</label>
                        <input id="email" type="email" disabled
                            class="block w-full px-4 py-3 rounded-xl bg-slate-900/70 border border-slate-700 text-slate-400 sm:text-sm"
                            value="{{ $email }}">
                    </div>

                    <x-ui.input
                        id="password"
                        name="password"
                        type="password"
                        label="Password Baru"
                        autocomplete="new-password"
                        placeholder="Password baru"
                        :error="$errors->first('password')"
                    />

                    <x-ui.input
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        label="Konfirmasi Password"
                        autocomplete="new-password"
                        placeholder="Konfirmasi password baru"
                    />
                </div>

                <x-ui.button type="submit" class="w-full">
                    Reset Password
                </x-ui.button>
            </form>
        </x-auth.card>
    </div>
</section>
@endsection
