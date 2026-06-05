@extends('layouts.teacher')

@section('content')

<div class="space-y-6">

    <div>
        <h1 class="text-3xl font-bold text-gray-800">
            Booking Konseling
        </h1>

        <p class="text-gray-500">
            Daftar permintaan konseling yang menunggu persetujuan.
        </p>
    </div>

    @forelse($sessions as $session)

        <div class="bg-white p-6 rounded-3xl shadow flex justify-between items-center">

            <div>

                <h2 class="font-bold text-xl">
                    {{ $session->student->name }}
                </h2>

                <p class="text-gray-500">
                    {{ $session->student->kelas }}
                </p>

                <div class="mt-3 space-y-1 text-gray-600">

                    <p>
                        📅 {{ $session->session_date }}
                    </p>

                    <p>
                        ⏰ {{ substr($session->session_time,0,5) }}
                    </p>

                    <p>
                        📝 {{ $session->student_note ?? 'Tidak ada catatan' }}
                    </p>

                </div>

            </div>

            <div class="flex gap-2">

                <form
                    method="POST"
                    action="{{ route('teacher.session.accept', $session->id) }}"
                >
                    @csrf
                    @method('PATCH')

                    <button
                        class="bg-teal-500 hover:bg-teal-600 text-white px-5 py-3 rounded-2xl"
                    >
                        Terima
                    </button>

                </form>

                <form
                    method="POST"
                    action="{{ route('teacher.session.reject', $session->id) }}"
                >
                    @csrf
                    @method('PATCH')

                    <button
                        class="bg-red-500 hover:bg-red-600 text-white px-5 py-3 rounded-2xl"
                    >
                        Tolak
                    </button>

                </form>

            </div>

        </div>

    @empty

        <div class="bg-white rounded-[32px] p-10 text-center shadow-sm">

            <div class="text-6xl mb-4">
                📪
            </div>

            <h2 class="text-xl font-bold text-gray-700">
                Belum Ada booking Aktif
            </h2>

            <p class="text-gray-500 mt-2">
                Tidak ada booking yang menunggu persetujuan.
            </p>

        </div>

    @endforelse

</div>

@endsection
