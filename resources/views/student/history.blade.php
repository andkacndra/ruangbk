@extends('layouts.student')

@section('content')

<div class="space-y-6">

    <div>
        <h1 class="text-3xl font-bold text-gray-800">
            Riwayat Konseling
        </h1>

        <p class="text-gray-500">
            Pantau status booking konselingmu.
        </p>
    </div>

    <div class="grid gap-5">

        @forelse($sessions as $session)

            <div class="bg-white rounded-[32px] p-6 shadow-sm">

                <div class="flex justify-between items-center">

                    <!-- KIRI -->
                    <div>

                        <div class="flex items-center gap-3 mb-4">

                            <h2 class="text-xl font-bold">
                                {{ $session->teacher->name }}
                            </h2>

                            @if($session->status == 'pending')
                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
                                    Pending
                                </span>

                            @elseif($session->status == 'accepted')
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                                    Diterima
                                </span>
                            @elseif($session->status == 'completed')
                                <span class="bg-amber-100 text-amber-700 px-3 py-1 rounded-full text-sm">
                                    Selesai
                                </span>
                            @elseif($session->status == 'rejected')
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">
                                    Ditolak
                                </span>
                            @endif

                        </div>

                        <div class="space-y-2 text-gray-600">

                            <p>📅 {{ $session->session_date }}</p>

                            <p>⏰ {{ substr($session->session_time,0,5) }}</p>

                            <p>📝 {{ $session->student_note ?? '-' }}</p>

                        </div>

                    </div>

                    <!-- KANAN -->
                    <div>

                        @if($session->status == 'accepted')

                            <a
                                href="{{ route('chat.show', $session->id) }}"
                                class="
                                    bg-teal-500
                                    hover:bg-teal-600
                                    text-white
                                    px-5 py-3
                                    rounded-2xl
                                    font-medium
                                    transition">

                                Mulai Konseling

                            </a>

                        @endif

                    </div>

                </div>

            </div>

        @empty

            <div class="bg-white rounded-[32px] p-10 text-center">

                <div class="text-6xl mb-4">
                    📭
                </div>

                <h2 class="text-xl font-bold text-gray-700">
                    Belum Ada Riwayat Konseling
                </h2>

            </div>

        @endforelse

    </div>

</div>

@endsection
