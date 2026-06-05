@extends('layouts.student')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="bg-white rounded-[32px] p-8 shadow-sm">

        <h1 class="text-3xl font-bold text-gray-800 mb-3">
            Mood Check Hari Ini
        </h1>

        <p class="text-gray-500 mb-8">
            Jawab sesuai kondisi yang kamu rasakan selama beberapa hari terakhir.
        </p>

        <form action="{{ route('student.mood-check.store') }}" method="POST">
            @csrf

            @php
                $questions = [
                    'Saya merasa semangat menjalani hari',
                    'Saya merasa cemas atau gelisah',
                    'Saya sulit fokus belajar',
                    'Saya merasa sedih tanpa alasan jelas',
                    'Saya merasa percaya diri di sekolah',
                    'Saya mudah marah akhir-akhir ini',
                    'Saya merasa lelah secara emosional',
                    'Saya merasa nyaman dengan teman-teman',
                    'Saya merasa terbebani oleh tugas sekolah',
                    'Saya merasa punya harapan untuk hari esok',
                ];

                $options = [
                    'Tidak Pernah',
                    'Kadang-kadang',
                    'Sering',
                    'Sangat Sering',
                ];
            @endphp

            @foreach($questions as $index => $question)

                <div class="mb-6">

                    <label class="font-medium text-gray-700 block mb-3">
                        {{ $index + 1 }}. {{ $question }}
                    </label>

                    <select name="answers[{{ $index }}]"
                        class="w-full border rounded-xl p-3">

                        @foreach($options as $option)
                            <option value="{{ $option }}">
                                {{ $option }}
                            </option>
                        @endforeach

                    </select>

                </div>

            @endforeach

            <button
                type="submit"
                class="bg-teal-500 hover:bg-teal-600 text-white px-6 py-3 rounded-2xl transition">

                Lihat Hasil
            </button>

        </form>

    </div>

</div>

@endsection
