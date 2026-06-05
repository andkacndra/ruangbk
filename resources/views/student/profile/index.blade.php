@extends('layouts.student')

@section('content')
<div class="space-y-8">

    {{-- Alert Success --}}
    @if(session('success'))
    <div class="bg-green-100 border border-green-200
        text-green-700 px-5 py-4 rounded-2xl
        shadow-sm">

        {{ session('success') }}
    </div>
    @endif

    {{-- Header --}}
    <div>
        <h1 class="text-3xl font-bold text-gray-800">
            Profil Saya
        </h1>

        <p class="text-gray-500">
            Informasi akun siswa
        </p>
    </div>

    {{-- Card Profil --}}
    <div class="bg-white rounded-3xl shadow-sm p-8">

        <div class="grid md:grid-cols-2 gap-6">

            {{-- Nama --}}
            <div>
                <p class="text-sm text-gray-500">
                    Nama Lengkap
                </p>

                <p class="font-semibold text-gray-800 text-lg mt-1">
                    {{ $user->name }}
                </p>
            </div>

            {{-- Email --}}
            <div>
                <p class="text-sm text-gray-500">
                    Email
                </p>

                <p class="font-semibold text-gray-800 text-lg mt-1">
                    {{ $user->email }}
                </p>
            </div>

            {{-- Nomor HP --}}
            <div>
                <p class="text-sm text-gray-500">
                    Nomor HP
                </p>

                <p class="font-semibold text-gray-800 text-lg mt-1">
                    {{ $user->phone ?? '-' }}
                </p>
            </div>

            {{-- Jenis Kelamin --}}
            <div>
                <p class="text-sm text-gray-500">
                    Jenis Kelamin
                </p>

                <p class="font-semibold text-gray-800 text-lg mt-1 capitalize">
                    {{ $user->gender ?? '-' }}
                </p>
            </div>

            {{-- Kelas --}}
            <div>
                <p class="text-sm text-gray-500">
                    Kelas
                </p>

                <p class="font-semibold text-gray-800 text-lg mt-1">
                    {{ $user->kelas ?? '-' }}
                </p>
            </div>

            {{-- Jurusan --}}
            <div>
                <p class="text-sm text-gray-500">
                    Jurusan
                </p>

                <p class="font-semibold text-gray-800 text-lg mt-1">
                    {{ $user->jurusan ?? '-' }}
                </p>
            </div>

        </div>

        {{-- Button --}}
        <div class="flex flex-wrap gap-4 mt-8">

            <a href="{{ route('student.profile.edit') }}"
                class="bg-teal-500 hover:bg-teal-600
                text-white px-6 py-3 rounded-2xl
                transition shadow-sm">

                Edit Profil
            </a>

            <a href="{{ route('student.profile.password') }}"
                class="bg-gray-100 hover:bg-gray-200
                text-gray-700 px-6 py-3 rounded-2xl
                transition">

                Ubah Password
            </a>

        </div>

    </div>

</div>
@endsection
