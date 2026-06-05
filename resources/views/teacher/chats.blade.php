@extends('layouts.teacher')

@section('content')

<div>
    <h1 class="text-3xl font-bold text-gray-800">
        Chat Konseling
    </h1>

    <p class="text-gray-500">
        Daftar konseling yang sedang berlangsung.
    </p>
</div>

<div class="space-y-4 mt-6">

@forelse($sessions as $session)

    <div class="bg-white p-5 rounded-2xl shadow flex justify-between items-center">

        <div>

            <h3 class="font-bold text-gray-800">
                {{ $session->student->name }}
            </h3>

            <p class="text-sm text-gray-500">
                {{ $session->student->kelas ?? '-' }}
            </p>

            <p class="text-sm text-gray-500 mt-2">
                Konseling telah disetujui
            </p>

        </div>

        <a
            href="{{ route('chat.show', $session->id) }}"
            class="
                bg-teal-500
                hover:bg-teal-600
                text-white
                px-5 py-3
                rounded-2xl
                transition">

            Chat Siswa

        </a>

    </div>

@empty

    <div class="bg-white rounded-[32px] p-10 text-center shadow-sm">

        <div class="text-6xl mb-4">
            💬
        </div>

        <h2 class="text-xl font-bold text-gray-700">
            Belum Ada Konseling Aktif
        </h2>

        <p class="text-gray-500 mt-2">
            Siswa yang sudah diterima akan muncul di sini.
        </p>

    </div>

@endforelse

</div>

@endsection
