@extends('layouts.student')

@section('content')

<div class="max-w-5xl mx-auto space-y-6">

    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                Tes Mental
            </h1>

            <p class="text-gray-500">
                Jawab sesuai kondisi yang paling menggambarkan dirimu.
            </p>
        </div>

        <a
            href="{{ route('student.mental-test.history') }}"
            class="bg-white border px-5 py-3 rounded-2xl">
            Riwayat Tes
        </a>
    </div>

    <form
        action="{{ route('student.mental-test.store') }}"
        method="POST"
        class="space-y-8">

        @csrf

        @php
        $options = [
            1 => 'Tidak Pernah',
            2 => 'Jarang',
            3 => 'Kadang-kadang',
            4 => 'Sering',
            5 => 'Sangat Sering',
        ];
        @endphp

        <!-- STRES AKADEMIK -->
        <div class="bg-white p-6 rounded-[32px] shadow-sm">

            <h2 class="text-xl font-bold mb-5 text-teal-600">
                📚 Stres Akademik
            </h2>

            @foreach([
                'Saya merasa terbebani oleh tugas sekolah.',
                'Saya kesulitan membagi waktu belajar.',
                'Saya merasa tertekan karena nilai pelajaran.',
                'Saya sering merasa lelah karena kegiatan sekolah.',
                'Saya merasa khawatir terhadap ujian.',
            ] as $index => $question)

            <div class="mb-6">

                <p class="font-medium mb-3">
                    {{ $question }}
                </p>

                <div class="flex flex-wrap gap-4">

                    @foreach($options as $value => $label)

                    <label>
                        <input
                            type="radio"
                            name="a{{ $index + 1 }}"
                            value="{{ $value }}"
                            required>

                        {{ $label }}
                    </label>

                    @endforeach

                </div>

            </div>

            @endforeach

        </div>

        <!-- KECEMASAN -->
        <div class="bg-white p-6 rounded-[32px] shadow-sm mt-5">

            <h2 class="text-xl font-bold mb-5 text-orange-500">
                😟 Kecemasan Emosional
            </h2>

            @foreach([
                'Saya sering merasa cemas tanpa alasan yang jelas.',
                'Saya sulit merasa tenang saat menghadapi masalah.',
                'Saya sering memikirkan hal buruk yang mungkin terjadi.',
                'Saya merasa tidak percaya diri.',
                'Saya sering merasa sedih atau murung.',
            ] as $index => $question)

            <div class="mb-6">

                <p class="font-medium mb-3">
                    {{ $question }}
                </p>

                <div class="flex flex-wrap gap-4">

                    @foreach($options as $value => $label)

                    <label>
                        <input
                            type="radio"
                            name="b{{ $index + 1 }}"
                            value="{{ $value }}"
                            required>

                        {{ $label }}
                    </label>

                    @endforeach

                </div>

            </div>

            @endforeach

        </div>

        <!-- SOSIAL -->
        <div class="bg-white p-6 rounded-[32px] shadow-sm mt-5">

            <h2 class="text-xl font-bold mb-5 text-purple-500">
                🤝 Sosial & Pertemanan
            </h2>

            @foreach([
                'Saya merasa kesulitan bergaul dengan teman.',
                'Saya merasa tidak diterima dalam lingkungan pertemanan.',
                'Saya pernah merasa dikucilkan.',
                'Saya merasa tidak nyaman berbicara di depan banyak orang.',
                'Saya kesulitan mengungkapkan pendapat kepada orang lain.',
            ] as $index => $question)

            <div class="mb-6">

                <p class="font-medium mb-3">
                    {{ $question }}
                </p>

                <div class="flex flex-wrap gap-4">

                    @foreach($options as $value => $label)

                    <label>
                        <input
                            type="radio"
                            name="c{{ $index + 1 }}"
                            value="{{ $value }}"
                            required>

                        {{ $label }}
                    </label>

                    @endforeach

                </div>

            </div>

            @endforeach

        </div>

        <button
            class="bg-teal-500 hover:bg-teal-600 text-white px-8 py-4 rounded-2xl mt-5 p-10">
            Lihat Hasil Tes
        </button>

    </form>

</div>

@endsection
