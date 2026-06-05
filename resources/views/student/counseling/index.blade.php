@extends('layouts.student')

@section('content')

<div class="space-y-6">

    <!-- Header -->
    <div>
        <h1 class="text-3xl font-bold text-gray-800">
            Pilih Guru BK
        </h1>

        <p class="text-gray-500 mt-1">
            Temukan guru BK yang paling nyaman untuk kamu ajak cerita.
        </p>
    </div>

    <!-- Teacher List -->
    <div class="grid lg:grid-cols-2 gap-5">

        @forelse($teachers as $teacher)

            <div class="bg-white rounded-[32px] p-6 shadow-sm hover:shadow-lg transition">

                <div class="flex gap-5">

                    <!-- Avatar -->
                    <div class="w-24 h-24 rounded-3xl bg-teal-100 flex items-center justify-center text-4xl shrink-0">
                        👩‍🏫
                    </div>

                    <div class="flex-1">

                        <div class="flex items-center justify-between">

                            <h2 class="text-xl font-bold text-gray-800">
                                {{ $teacher->name }}
                            </h2>

                            @if($teacher->status == 'available')
                                <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm">
                                    Tersedia
                                </span>
                            @elseif($teacher->status == 'busy')
                                <span class="bg-yellow-100 text-yellow-600 px-3 py-1 rounded-full text-sm">
                                    Sibuk
                                </span>
                            @else
                                <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-sm">
                                    Offline
                                </span>
                            @endif

                        </div>

                        <p class="text-teal-600 font-medium mt-2">
                            {{ $teacher->specialization ?? 'Guru BK' }}
                        </p>

                        <p class="text-gray-500 text-sm mt-3">
                            Siap mendampingi siswa dalam konsultasi akademik dan kesehatan mental.
                        </p>

                        <a href="{{ route('student.counseling.show', $teacher->id) }}"
                            class="inline-block mt-5 bg-teal-500 hover:bg-teal-600 text-white px-5 py-3 rounded-2xl transition">

                            Pilih Guru
                        </a>

                    </div>

                </div>

            </div>

        @empty

            <div class="bg-white rounded-[32px] p-10 text-center col-span-full">

                <div class="text-6xl mb-4">
                    😔
                </div>

                <h2 class="font-bold text-xl text-gray-700">
                    Belum Ada Guru BK
                </h2>

                <p class="text-gray-500 mt-2">
                    Guru BK belum tersedia saat ini.
                </p>

            </div>

        @endforelse

    </div>

</div>

@endsection
