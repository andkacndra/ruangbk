@extends('layouts.student')

@section('content')

@php

function kategori($nilai)
{
    if ($nilai >= 19) {
        return 'Tinggi';
    }

    if ($nilai >= 12) {
        return 'Sedang';
    }

    return 'Rendah';
}

$academic = kategori($result->academic_score);
$anxiety = kategori($result->anxiety_score);
$social = kategori($result->social_score);

@endphp

<div class="max-w-4xl mx-auto space-y-6">

    <div>
        <h1 class="text-3xl font-bold text-gray-800">
            Hasil Tes Mental
        </h1>

        <p class="text-gray-500">
            Berikut hasil evaluasi kondisi psikologis sederhana.
        </p>
    </div>

    <div class="grid md:grid-cols-3 gap-5">

        <div class="bg-white rounded-[32px] p-6 shadow-sm">
            <h3 class="font-bold text-teal-600">
                Akademik
            </h3>

            <p class="text-4xl font-bold mt-3">
                {{ $result->academic_score }}
            </p>

            <p class="mt-2">
                {{ $academic }}
            </p>
        </div>

        <div class="bg-white rounded-[32px] p-6 shadow-sm">
            <h3 class="font-bold text-orange-500">
                Kecemasan
            </h3>

            <p class="text-4xl font-bold mt-3">
                {{ $result->anxiety_score }}
            </p>

            <p class="mt-2">
                {{ $anxiety }}
            </p>
        </div>

        <div class="bg-white rounded-[32px] p-6 shadow-sm">
            <h3 class="font-bold text-purple-500">
                Sosial
            </h3>

            <p class="text-4xl font-bold mt-3">
                {{ $result->social_score }}
            </p>

            <p class="mt-2">
                {{ $social }}
            </p>
        </div>

    </div>

    <div class="bg-white rounded-[32px] p-6 shadow-sm">

        <h2 class="text-xl font-bold mb-4">
            Analisis Hasil
        </h2>

        <div
            class="
            rounded-2xl
            bg-teal-50
            border
            border-teal-200
            p-5">

            <p class="font-semibold text-teal-700 mb-2">
                Area yang paling membutuhkan perhatian:
            </p>

            <p class="text-lg font-bold text-gray-800 capitalize">
                {{ $highestCategory }}
            </p>

            <p class="mt-4 text-gray-700 leading-relaxed">
                {{ $recommendation }}
            </p>

        </div>

        <a
            href="{{ route('student.counseling') }}"
            class="inline-block mt-5 bg-teal-500 text-white px-6 py-3 rounded-2xl">

            Booking Konseling
        </a>

        <a
            href="{{ route('student.mental-test') }}"
            class="inline-block mt-3 ml-3 bg-gray-200 text-gray-700 px-6 py-3 rounded-2xl">

            Tes Ulang
        </a>

    </div>

</div>

@endsection
