@extends('layouts.student')

@section('content')

@php
    $hour = now()->hour;

    if ($hour >= 5 && $hour < 12) {
        $greeting = 'Selamat pagi';
        $emoji = '☀️';
        $message = 'Semoga harimu menyenangkan dan penuh semangat.';
    } elseif ($hour >= 12 && $hour < 15) {
        $greeting = 'Selamat siang';
        $emoji = '🌤️';
        $message = 'Jangan lupa istirahat sejenak di tengah aktivitasmu.';
    } elseif ($hour >= 15 && $hour < 18) {
        $greeting = 'Selamat sore';
        $emoji = '⛅';
        $message = 'Terima kasih sudah bertahan sampai sore ini.';
    } else {
        $greeting = 'Selamat malam';
        $emoji = '🌙';
        $message = 'Semoga harimu berjalan baik. RuangBK siap menemanimu.';
    }
@endphp

<div class="space-y-6">

    <!-- Hero Greeting -->
    <div class="bg-gradient-to-r from-teal-500 to-cyan-500 rounded-[32px] p-7 text-white shadow-lg">

        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

            <div>
                <h1 class="text-3xl font-bold mb-2">
                    {{ $greeting }}, {{ auth()->user()->name }} {{ $emoji }}
                </h1>

                <p class="text-teal-50 text-base lg:text-lg">
                    {{ $message }}
                </p>

                <div class="mt-5 flex flex-wrap gap-3">

                    <div class="bg-white/20 px-4 py-2 rounded-full text-sm">
                        {{ auth()->user()->kelas }}
                    </div>

                    <div class="bg-white/20 px-4 py-2 rounded-full text-sm">
                        {{ auth()->user()->jurusan }}
                    </div>

                </div>
            </div>

            <div class="bg-white/20 rounded-3xl p-5 backdrop-blur-md">

                <p class="text-sm opacity-90 mb-2">
                    Mood Check Hari Ini
                </p>

                <h3 class="font-bold text-xl mb-3">
                    Gimana perasaanmu hari ini?
                </h3>

                <a
                    href="{{ route('student.mood-check') }}"
                    class="inline-block bg-white text-teal-600 px-5 py-3 rounded-2xl font-semibold hover:scale-105 transition"
                >
                    Cek Sekarang
                </a>

            </div>

        </div>

    </div>

    <!-- Quick Menu -->
    <div>
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-bold text-gray-700">
                Menu Cepat
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

            <a href="{{ route('student.counseling') }}" class="bg-white rounded-[28px] p-5 shadow-sm hover:shadow-lg transition cursor-pointer hover:-translate-y-1 block">

                <div class="bg-teal-100 w-14 h-14 rounded-2xl flex items-center justify-center text-3xl mb-4">
                    📅
                </div>

                <h3 class="font-semibold text-gray-800">
                    Booking Konseling
                </h3>

                <p class="text-sm text-gray-500 mt-1">
                    Pilih guru BK favoritmu
                </p>

            </a>

            <a href="{{ route('student.mental-test') }}" class="bg-white rounded-[28px] p-5 shadow-sm hover:shadow-lg transition cursor-pointer hover:-translate-y-1">

                <div class="bg-orange-100 w-14 h-14 rounded-2xl flex items-center justify-center text-3xl mb-4">
                    🧠
                </div>

                <h3 class="font-semibold text-gray-800">
                    Tes Mental
                </h3>

                <p class="text-sm text-gray-500 mt-1">
                    Stress, burnout, anxiety
                </p>

            </a>

            <a href="{{ route('student.articles') }}" class="bg-white rounded-[28px] p-5 shadow-sm hover:shadow-lg transition cursor-pointer hover:-translate-y-1">

                <div class="bg-blue-100 w-14 h-14 rounded-2xl flex items-center justify-center text-3xl mb-4">
                    📚
                </div>

                <h3 class="font-semibold text-gray-800">
                    Artikel
                </h3>

                <p class="text-sm text-gray-500 mt-1">
                    Edukasi kesehatan mental
                </p>

            </a>

        </div>

    </div>

    <!-- Upcoming Counseling + AI -->
    <div class="bg-white rounded-[32px] p-6 shadow-sm">

        <!-- KONSELING MENDATANG -->
        <div class="lg:col-span-2 bg-white rounded-[32px] p-6 shadow-sm">

            <div class="flex items-center justify-between mb-5">

                <h2 class="text-xl font-bold text-gray-700">
                    Konseling Mendatang
                </h2>

                <span class="text-sm text-teal-600 font-medium">
                    {{ $upcomingSessions->count() }} Konseling Aktif
                </span>

            </div>

            @if($upcomingSessions->count())

                <div class="space-y-4">

                    @foreach($upcomingSessions as $session)

                        <div class="border border-slate-200 rounded-[24px] p-5">

                            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                                <div>

                                    <h3 class="font-bold text-lg text-gray-800">
                                        {{ $session->teacher->name }}
                                    </h3>

                                    <p class="text-gray-500 text-sm mt-1">
                                        📅 {{ $session->session_date }}
                                    </p>

                                    <p class="text-gray-500 text-sm">
                                        ⏰ {{ substr($session->session_time,0,5) }}
                                    </p>

                                    @if($session->student_note)
                                        <p class="text-gray-500 text-sm mt-2">
                                            📝 {{ $session->student_note }}
                                        </p>
                                    @endif

                                </div>

                                <div>

                                    @if($session->status == 'pending')

                                        <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm">
                                            Menunggu Persetujuan
                                        </span>

                                    @elseif($session->status == 'accepted')

                                        <a
                                            href="{{ route('chat.show', $session->id) }}"
                                            class="inline-block bg-teal-500 hover:bg-teal-600 text-white px-5 py-3 rounded-2xl transition">

                                            Mulai Konseling
                                        </a>

                                    @endif

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="bg-slate-50 border border-dashed border-slate-300 rounded-[24px] p-10 text-center">

                    <div class="text-5xl mb-4">
                        📅
                    </div>

                    <h3 class="font-semibold text-lg text-gray-700 mb-2">
                        Belum Ada Jadwal Konseling
                    </h3>

                    <p class="text-gray-500 text-sm mb-5">
                        Yuk mulai cerita dan booking guru BK yang nyaman buat kamu.
                    </p>

                    <a
                        href="{{ route('student.counseling') }}"
                        class="inline-block bg-teal-500 hover:bg-teal-600 text-white px-5 py-3 rounded-2xl transition">

                        Booking Sekarang
                    </a>

                </div>

            @endif

        </div>

    </div>

</div>

<div
    id="notification-toast"
    class="
        hidden
        fixed
        top-5
        right-5
        bg-white
        shadow-xl
        rounded-2xl
        p-5
        border
        z-50
        max-w-sm">

    <h3
        id="toast-title"
        class="font-bold">
    </h3>

    <p
        id="toast-message"
        class="text-gray-500 text-sm">
    </p>

</div>

<script>

window.addEventListener(
    'new-notification',
    (event) => {

        const notif =
            event.detail;

        document
            .getElementById(
                'toast-title'
            )
            .innerText =
            notif.title;

        document
            .getElementById(
                'toast-message'
            )
            .innerText =
            notif.message;

        const toast =
            document
            .getElementById(
                'notification-toast'
            );

        toast.classList
            .remove('hidden');

        setTimeout(() => {

            toast.classList
                .add('hidden');

        }, 5000);

        badge.classList
            .remove('hidden');

        badge.innerText =
            parseInt(
                badge.innerText
            ) + 1;
    }
);

</script>

@endsection
