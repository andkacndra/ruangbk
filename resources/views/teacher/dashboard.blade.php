@extends('layouts.teacher')

@section('content')

<div class="space-y-6">

    <!-- HEADER -->
    <div>
        <h1 class="text-2xl font-bold text-gray-800">
            Dashboard Guru BK
        </h1>

        <p class="text-gray-500">
            Kelola semua booking siswa
        </p>
    </div>

    <!-- STAT CARDS -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

        <div class="bg-white p-5 rounded-2xl shadow">
            <p class="text-gray-500">
                Pending
            </p>

            <h2 class="text-2xl font-bold">
                {{ $pendingCount }}
            </h2>
        </div>

        <div class="bg-teal-50 p-5 rounded-2xl shadow">
            <p class="text-teal-600">
                Diterima
            </p>

            <h2 class="text-2xl font-bold text-teal-700">
                {{ $acceptedCount }}
            </h2>
        </div>

        <div class="bg-red-50 p-5 rounded-2xl shadow">
            <p class="text-red-600">
                Ditolak
            </p>

            <h2 class="text-2xl font-bold text-red-700">
                {{ $rejectedCount }}
            </h2>
        </div>

        <div class="bg-amber-50 p-5 rounded-2xl shadow">
            <p class="text-amber-600">
                Selesai
            </p>

            <h2 class="text-2xl font-bold text-amber-700">
                {{ $completedCount }}
            </h2>
        </div>

    </div>

    <!-- LIST BOOKING -->
    <div class="space-y-4">

        @foreach($sessions as $session)

        <div class="bg-white p-5 rounded-2xl shadow flex justify-between items-center">

            <!-- LEFT -->
            <div>

                <h3 class="font-bold text-gray-800">
                    {{ $session->student->name }}
                </h3>

                <p class="text-sm text-gray-500">
                    {{ $session->student->kelas ?? '-' }}
                </p>

                <div class="mt-2 text-sm text-gray-600 space-y-1">

                    <p>
                        📅 {{ $session->session_date }}
                    </p>

                    <p>
                        🕒 {{ \Carbon\Carbon::parse($session->session_time)->format('H:i') }}
                    </p>

                    <p>
                        📝 {{ $session->student_note ?? 'Tidak ada catatan' }}
                    </p>

                </div>

                {{-- STATUS --}}
                <span class="text-xs mt-3 inline-block px-3 py-1 rounded-full

                    @if($session->status == 'pending')
                        bg-yellow-100 text-yellow-700

                    @elseif($session->status == 'accepted')
                        bg-teal-100 text-teal-700

                    @elseif($session->status == 'completed')
                        bg-amber-100 text-amber-700

                    @else
                        bg-red-100 text-red-700
                    @endif

                ">

                    @if($session->status == 'pending')
                        PENDING

                    @elseif($session->status == 'accepted')
                        DITERIMA

                    @elseif($session->status == 'completed')
                        SELESAI

                    @else
                        DITOLAK
                    @endif

                </span>

            </div>

            <!-- RIGHT ACTION -->
            <div class="flex gap-2">

                @if($session->status == 'pending')

                    <form
                        method="POST"
                        action="{{ route('teacher.session.accept', $session->id) }}">

                        @csrf
                        @method('PATCH')

                        <button
                            class="
                                bg-teal-500
                                hover:bg-teal-600
                                text-white
                                px-4 py-2
                                rounded-xl
                                transition">

                            Terima

                        </button>

                    </form>

                    <form
                        method="POST"
                        action="{{ route('teacher.session.reject', $session->id) }}">

                        @csrf
                        @method('PATCH')

                        <button
                            class="
                                bg-red-500
                                hover:bg-red-600
                                text-white
                                px-4 py-2
                                rounded-xl
                                transition">

                            Tolak

                        </button>

                    </form>

                @elseif($session->status == 'accepted')

                    <a
                        href="{{ route('chat.show', $session->id) }}"
                        class="
                            bg-teal-500
                            hover:bg-teal-600
                            text-white
                            px-5 py-3
                            rounded-2xl
                            transition">

                        Chat Siswa

                    </a>

                @elseif($session->status == 'completed')

                    <span
                        class="
                            bg-amber-100
                            text-amber-700
                            px-4 py-2
                            rounded-xl
                            text-sm
                            font-medium">

                        Selesai

                    </span>

                @else

                    <span
                        class="
                            bg-red-100
                            text-red-700
                            px-4 py-2
                            rounded-xl
                            text-sm
                            font-medium">

                        Ditolak

                    </span>

                @endif

            </div>

        </div>

        @endforeach

    </div>

</div>

@endsection
