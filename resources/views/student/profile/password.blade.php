@extends('layouts.student')

@section('content')
<div class="space-y-8">

    {{-- Header --}}
    <div>
        <h1 class="text-3xl font-bold text-gray-800">
            Ubah Password
        </h1>

        <p class="text-gray-500">
            Ganti password akun kamu
        </p>
    </div>

    {{-- Error --}}
    @if($errors->any())
    <div class="bg-red-100 border border-red-200
        text-red-700 px-5 py-4 rounded-2xl">

        <ul class="list-disc list-inside">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- Card --}}
    <div class="bg-white rounded-3xl shadow-sm p-8">

        <form action="{{ route('student.profile.password.update') }}"
            method="POST"
            class="space-y-6">

            @csrf
            @method('PUT')

            {{-- Password Lama --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Password Lama
                </label>

                <input type="password"
                    name="current_password"
                    class="w-full border border-gray-200
                    rounded-2xl px-4 py-3
                    focus:ring-2 focus:ring-teal-500
                    outline-none"
                    required>
            </div>

            {{-- Password Baru --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Password Baru
                </label>

                <input type="password"
                    name="password"
                    class="w-full border border-gray-200
                    rounded-2xl px-4 py-3
                    focus:ring-2 focus:ring-teal-500
                    outline-none"
                    required>
            </div>

            {{-- Konfirmasi Password --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Konfirmasi Password Baru
                </label>

                <input type="password"
                    name="password_confirmation"
                    class="w-full border border-gray-200
                    rounded-2xl px-4 py-3
                    focus:ring-2 focus:ring-teal-500
                    outline-none"
                    required>
            </div>

            {{-- Button --}}
            <div class="flex gap-4 pt-4">

                <button type="submit"
                    class="bg-teal-500 hover:bg-teal-600
                    text-white px-6 py-3 rounded-2xl
                    transition shadow-sm">

                    Simpan Password
                </button>

                <a href="{{ route('student.profile') }}"
                    class="bg-gray-100 hover:bg-gray-200
                    text-gray-700 px-6 py-3 rounded-2xl
                    transition">

                    Batal
                </a>

            </div>

        </form>

    </div>

</div>
@endsection
