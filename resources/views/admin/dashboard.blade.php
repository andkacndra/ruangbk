@extends('layouts.admin')

@section('content')
<div class="space-y-8">

    <div>
        <h1 class="text-3xl font-bold text-gray-800">
            Dashboard Admin
        </h1>

        <p class="text-gray-500">
            Selamat datang di panel admin RuangBK
        </p>
    </div>

    {{-- Statistik --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

        <div class="bg-white p-6 rounded-3xl shadow-sm">
            <p class="text-gray-500 text-sm">Total Siswa</p>
            <h2 class="text-3xl font-bold text-teal-600 mt-2">
                {{ $totalStudents }}
            </h2>
        </div>

        <div class="bg-white p-6 rounded-3xl shadow-sm">
            <p class="text-gray-500 text-sm">Guru BK</p>
            <h2 class="text-3xl font-bold text-blue-600 mt-2">
                {{ $totalTeachers }}
            </h2>
        </div>

        <div class="bg-white p-6 rounded-3xl shadow-sm">
            <p class="text-gray-500 text-sm">Konseling</p>
            <h2 class="text-3xl font-bold text-purple-600 mt-2">
                {{ $totalCounseling }}
            </h2>
        </div>

        <div class="bg-white p-6 rounded-3xl shadow-sm">
            <p class="text-gray-500 text-sm">Artikel</p>
            <h2 class="text-3xl font-bold text-orange-600 mt-2">
                {{ $totalArticles }}
            </h2>
        </div>
    </div>

    {{-- Data terbaru --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        {{-- Booking terbaru --}}
        <div class="bg-white rounded-3xl shadow-sm p-6">
            <div class="flex items-center justify-between mb-5">
                <h2 class="text-xl font-semibold text-gray-800">
                    Booking Terbaru
                </h2>

                <span class="text-sm text-gray-400">
                    {{ count($latestBookings) }} booking
                </span>
            </div>

            <div class="space-y-4">

                @forelse($latestBookings as $booking)

                    <div class="border border-gray-100 rounded-2xl p-4 hover:shadow-md transition">

                        <div class="flex items-start justify-between">

                            <div>
                                {{-- Nama siswa --}}
                                <h3 class="font-semibold text-gray-800 text-base">
                                    {{ $booking->student->name ?? '-' }}
                                </h3>

                                {{-- Kelas --}}
                                <p class="text-sm text-gray-500 mt-1">
                                    {{ $booking->student->kelas ?? '-' }}
                                </p>
                            </div>

                            {{-- Status --}}
                            <span class="px-3 py-1 rounded-full text-xs font-medium
                                @if($booking->status == 'pending')
                                    bg-yellow-100 text-yellow-700
                                @elseif($booking->status == 'accepted')
                                    bg-teal-100 text-teal-700
                                @elseif($booking->status == 'rejected')
                                    bg-red-100 text-red-600
                                @else
                                    bg-gray-100 text-gray-600
                                @endif
                            ">

                                {{ ucfirst($booking->status) }}
                            </span>

                        </div>

                        {{-- Detail booking --}}
                        <div class="mt-4 grid grid-cols-2 gap-3 text-sm">

                            <div>
                                <p class="text-gray-400">
                                    Tanggal
                                </p>

                                <p class="font-medium text-gray-700">
                                    {{ \Carbon\Carbon::parse($booking->session_date)->format('d M Y') }}
                                </p>
                            </div>

                            <div>
                                <p class="text-gray-400">
                                    Jam
                                </p>

                                <p class="font-medium text-gray-700">
                                    {{ $booking->session_time }}
                                </p>
                            </div>

                            <div class="col-span-2">
                                <p class="text-gray-400">
                                    Guru BK
                                </p>

                                <p class="font-medium text-gray-700">
                                    {{ $booking->teacher->name ?? '-' }}
                                </p>
                            </div>

                        </div>
                    </div>

                @empty

                    <div class="text-center py-10">
                        <p class="text-gray-400">
                            Belum ada booking konseling
                        </p>
                    </div>

                @endforelse

            </div>
        </div>

        {{-- Artikel terbaru --}}
        <div class="bg-white rounded-3xl shadow-sm p-6">
            <h2 class="text-xl font-semibold mb-4">
                Artikel Terbaru
            </h2>

            <div class="space-y-4">
                @forelse($latestArticles as $article)
                    <div class="border-b pb-3">
                        <p class="font-medium text-gray-800">
                            {{ $article->title }}
                        </p>

                        <p class="text-sm text-gray-500">
                            {{ $article->created_at->format('d M Y') }}
                        </p>
                    </div>
                @empty
                    <p class="text-gray-400">
                        Belum ada artikel
                    </p>
                @endforelse
            </div>
        </div>

    </div>

</div>
@endsection
