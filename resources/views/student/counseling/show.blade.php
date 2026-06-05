@extends('layouts.student')

@section('content')

<div class="space-y-6">

    <!-- Back -->
    <a href="{{ route('student.counseling') }}"
        class="text-teal-600 font-medium">
        ← Kembali
    </a>

    <!-- Profile Card -->
    <div class="bg-white rounded-[32px] p-6 shadow-sm">

        <div class="flex flex-col lg:flex-row gap-6">

            <div class="w-32 h-32 rounded-[32px] bg-teal-100 flex items-center justify-center text-6xl shrink-0">
                👩‍🏫
            </div>

            <div class="flex-1">

                <div class="flex flex-wrap items-center gap-3 mb-3">

                    <h1 class="text-3xl font-bold text-gray-800">
                        {{ $teacher->name }}
                    </h1>

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

                <p class="text-teal-600 font-semibold text-lg">
                    {{ $teacher->specialization ?? 'Guru BK' }}
                </p>

                <p class="text-gray-500 mt-4 leading-relaxed">
                    Siap membantu siswa dalam menghadapi masalah akademik,
                    stress sekolah, hubungan sosial, burnout,
                    dan kesehatan mental.
                </p>

            </div>

        </div>

    </div>

    <!-- Booking Form -->
    <div class="bg-white rounded-[32px] p-6 shadow-sm">

        <h2 class="text-2xl font-bold text-gray-800 mb-6">
            Booking Konseling
        </h2>

        <form method="POST" action="{{ route('student.counseling.book', $teacher->id) }}">

            @csrf

            <!-- Tanggal -->
            <div class="mb-5">

                <label class="block font-medium mb-2">
                    Pilih Tanggal
                </label>

                <input
                    type="date"
                    name="session_date"
                    value="{{ $selectedDate }}"
                    onchange="window.location='?date='+this.value"
                    class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-teal-500"
                    min="{{ now()->toDateString() }}"
                >

            </div>

            <!-- Jam -->
            <div class="mb-5">
                <label class="block font-medium mb-3">
                    Pilih Jam
                </label>
                <div class="grid grid-cols-2 lg:grid-cols-6 gap-3">

                    @foreach($availableTimes as $time)

                        @php
                            $isBooked = in_array($time, $bookedTimes);
                        @endphp

                        <label>
                            <input
                                type="radio"
                                name="session_time"
                                value="{{ $time }}"
                                class="hidden peer"
                                {{ $isBooked ? 'disabled' : '' }}
                            >

                            <div class="
                                border rounded-2xl py-3 text-center transition
                                peer-checked:bg-teal-500
                                peer-checked:text-white

                                {{ $isBooked
                                    ? 'bg-red-100 text-red-500 border-red-200 cursor-not-allowed'
                                    : 'border-gray-300 hover:bg-teal-500 hover:text-white cursor-pointer'
                                }}
">

                                {{ $time }}

                                @if($isBooked)
                                    <div class="text-xs">
                                        Penuh
                                    </div>
                                @endif

                            </div>
                        </label>

                    @endforeach

                </div>
            </div>

            <!-- Catatan -->
            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Cerita Singkat (Opsional)
                </label>

                <textarea
                    rows="4"
                    name="student_note"
                    class="w-full border border-gray-300 rounded-2xl p-4"
                    placeholder="Contoh: Lagi stress tugas, susah fokus belajar..."></textarea>

            </div>

            <button
                type="submit"
                class="w-full bg-teal-500 hover:bg-teal-600 text-white py-4 rounded-2xl font-semibold transition">

                Booking Sekarang
            </button>

        </form>

    </div>

</div>

@endsection
