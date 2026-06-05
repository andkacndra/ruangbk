@extends('layouts.admin')

@section('content')

<div class="flex items-center justify-between mb-8">

    <div>

        <h1 class="text-3xl font-bold text-slate-800">
            Kelola Artikel
        </h1>

        <p class="text-slate-500">
            Tambah, edit, dan hapus artikel RuangBK
        </p>

    </div>

    <a
        href="{{ route('admin.articles.create') }}"
        class="bg-teal-500 hover:bg-teal-600 text-white px-5 py-3 rounded-2xl font-semibold transition">

        + Tambah Artikel
    </a>

</div>

@if(session('success'))

<div class="bg-green-100 text-green-700 p-4 rounded-2xl mb-5">
    {{ session('success') }}
</div>

@endif

<div class="bg-white rounded-[10px] shadow-sm overflow-hidden">

    <table class="w-full">

        <thead class="bg-teal-500 text-white">

            <tr class="text-left font-semibold">

                <th class="px-6 py-5 rounded-tl-[10px]">
                    Judul
                </th>

                <th class="px-6 py-5">
                    Tanggal
                </th>

                <th class="px-6 py-5 text-center rounded-tr-[10px]">
                    Aksi
                </th>

            </tr>

        </thead>

        <tbody>

            @forelse($articles as $article)

                <tr class="border-t">

                    <td class="p-5 font-medium text-slate-700">
                        {{ $article->title }}
                    </td>

                    <td class="p-5 text-slate-500">
                        {{ optional($article->created_at)->format('d M Y') ?? '-' }}
                    </td>

                    <td class="p-5">

                        <div class="flex justify-center gap-3">

                            <a
                                href="{{ route('admin.articles.edit', $article->id) }}"
                                class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded-xl">

                                Edit
                            </a>

                            <form
                                action="{{ route('admin.articles.destroy', $article->id) }}"
                                method="POST">

                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('Yakin hapus artikel ini?')"
                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl">

                                    Hapus
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="3" class="text-center p-10 text-slate-500">

                        Belum ada artikel

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection
