@extends('layouts.admin')

@section('content')

<div class="max-w-4xl">

    <h1 class="text-3xl font-bold text-slate-800 mb-2">
        Edit Artikel
    </h1>

    <p class="text-slate-500 mb-8">
        Update artikel RuangBK
    </p>

    <div class="bg-white rounded-[32px] p-8 shadow-sm">

        <form
            method="POST"
            action="{{ route('admin.articles.update', $article->id) }}">

            @csrf
            @method('PUT')

            <div class="mb-5">

                <label class="block font-medium mb-2">
                    Judul Artikel
                </label>

                <input
                    type="text"
                    name="title"
                    value="{{ $article->title }}"
                    class="w-full border rounded-2xl p-4"
                    required>

            </div>

            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Isi Artikel
                </label>

                <textarea
                    name="content"
                    rows="10"
                    class="w-full border rounded-2xl p-4"
                    required>{{ $article->content }}</textarea>

            </div>

            <button
                class="bg-teal-500 hover:bg-teal-600 text-white px-6 py-3 rounded-2xl">

                Update Artikel
            </button>

        </form>

    </div>

</div>

@endsection
