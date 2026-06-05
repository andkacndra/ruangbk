@extends('layouts.student')

@section('content')

<div class="space-y-6">

    <div>
        <h1 class="text-3xl font-bold text-gray-800">
            Artikel Kesehatan Mental
        </h1>

        <p class="text-gray-500 mt-2">
            Bacaan ringan untuk membantu menjaga kesehatan mental dan menghadapi tantangan sekolah.
        </p>
    </div>

    <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">

        @foreach($articles as $article)

        <div class="bg-white rounded-[28px] p-6 shadow-sm hover:shadow-lg transition">

            <span class="inline-block bg-teal-100 text-teal-700 text-xs px-3 py-1 rounded-full mb-4">
                {{ $article->category }}
            </span>

            <h2 class="font-bold text-xl text-gray-800 mb-3">
                {{ $article->title }}
            </h2>

            <a
                href="{{ route('student.articles.show', $article->id) }}"
                class="inline-block bg-teal-500 hover:bg-teal-600 text-white mt-5 px-5 py-3 rounded-2xl transition">
                Baca Artikel
            </a>

        </div>

        @endforeach

    </div>

</div>

@endsection
