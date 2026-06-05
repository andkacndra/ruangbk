@extends('layouts.student')

@section('content')

<div class="space-y-6">

    <div>
        <h1 class="text-3xl font-bold text-gray-800">
            Riwayat Tes Mental
        </h1>

        <p class="text-gray-500">
            Lihat perkembangan hasil tes mental yang pernah kamu lakukan.
        </p>
    </div>

    @forelse($results as $result)

        <div class="bg-white rounded-[32px] p-6 shadow-sm">

            <div class="flex justify-between items-center">

                <div>

                    <h2 class="font-bold text-lg">
                        Tes Mental
                    </h2>

                    <p class="text-gray-500 text-sm">
                        {{ $result->created_at->format('d M Y H:i') }}
                    </p>

                </div>

                <a
                    href="{{ route('student.mental-test.result', $result->id) }}"
                    class="bg-teal-500 text-white px-4 py-2 rounded-xl">

                    Lihat Hasil
                </a>

            </div>

        </div>

    @empty

        <div class="bg-white rounded-[32px] p-10 text-center">

            <div class="text-6xl mb-4">
                🧠
            </div>

            <h2 class="text-xl font-bold text-gray-700">
                Belum Ada Riwayat Tes
            </h2>

        </div>

    @endforelse

</div>

@endsection
