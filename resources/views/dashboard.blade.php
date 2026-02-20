@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1 class="text-2xl font-bold mb-4">Dashboard</h1>
                
                @if (!auth()->user()->hasVerifiedEmail())
                    <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-4" role="alert">
                        <p class="font-bold">Email belum diverifikasi!</p>
                        <p>Silakan verifikasi email Anda untuk mengakses semua fitur.</p>
                        <form method="POST" action="{{ route('verification.send') }}" class="mt-2">
                            @csrf
                            <button type="submit" class="text-yellow-800 underline hover:text-yellow-900">
                                Kirim ulang email verifikasi
                            </button>
                        </form>
                    </div>
                @endif

                <div class="space-y-4">
                    <div>
                        <p class="text-gray-600">Selamat datang, <strong>{{ auth()->user()->name }}</strong>!</p>
                        <p class="text-gray-600">Email: {{ auth()->user()->email }}</p>
                        <p class="text-gray-600">Status Email: 
                            @if(auth()->user()->hasVerifiedEmail())
                                <span class="text-green-600 font-semibold">Terverifikasi</span>
                            @else
                                <span class="text-red-600 font-semibold">Belum Terverifikasi</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
