@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Verifikasi Email Anda
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Sebelum melanjutkan, silakan verifikasi email Anda. Kami telah mengirimkan link verifikasi ke email Anda.
            </p>
        </div>

        @if (session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="mt-8 space-y-6">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <div>
                    <button type="submit"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Kirim Ulang Email Verifikasi
                    </button>
                </div>
            </form>

            <div class="text-center">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="font-medium text-indigo-600 hover:text-indigo-500">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
