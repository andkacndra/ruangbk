@extends('layouts.student')

@section('content')

<div class="max-w-2xl mx-auto">

    <div class="bg-white rounded-[32px] p-8 shadow-sm text-center">

        <div class="text-6xl mb-4">
            {{ $emoji }}
        </div>

        <h1 class="text-3xl font-bold text-gray-800 mb-2">
            Hasil Mood Check
        </h1>

        <span class="
            inline-block px-4 py-2 rounded-full text-sm font-semibold
            @if($color=='green') bg-green-100 text-green-700
            @elseif($color=='yellow') bg-yellow-100 text-yellow-700
            @else bg-red-100 text-red-700
            @endif
        ">
            {{ $result }}
        </span>

        <p class="text-gray-600 mt-6 text-lg">
            {{ $message }}
        </p>

        <div class="mt-8 flex gap-3 justify-center">

            <a href="{{ route('student.mood-check') }}"
               class="bg-teal-500 text-white px-6 py-3 rounded-2xl">
                Isi Lagi
            </a>

            <a href="{{ route('student.dashboard') }}"
               class="bg-gray-200 text-gray-700 px-6 py-3 rounded-2xl">
                Kembali
            </a>

        </div>

    </div>

</div>

@endsection
