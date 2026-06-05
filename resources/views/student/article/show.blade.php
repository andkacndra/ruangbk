@extends('layouts.student')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="bg-white rounded-[32px] p-8 shadow-sm">

        <span class="inline-block bg-teal-100 text-teal-700 text-sm px-4 py-2 rounded-full mb-5">
            {{ $article->category }}
        </span>

        <h1 class="text-4xl font-bold text-gray-800 mb-4">
            {{ $article->title }}
        </h1>

        <div class="prose max-w-none text-gray-700 leading-8">

            {!! nl2br(e($article->content)) !!}

        </div>

        <div class="mt-10 pt-8 border-t">

            <h3 class="font-bold text-lg text-gray-800 mb-3">
                Masih membutuhkan bantuan?
            </h3>

            <p class="text-gray-500 mb-5">
                Kamu bisa langsung membuat jadwal konseling dengan guru BK.
            </p>

            <a
                href="{{ route('student.counseling') }}"
                class="inline-block bg-teal-500 hover:bg-teal-600 text-white px-6 py-3 rounded-2xl">

                Booking Konseling
            </a>

        </div>

    </div>

</div>

@endsection
