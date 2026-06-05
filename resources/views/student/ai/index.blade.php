@extends('layouts.student')

@section('content')

<div class="max-w-5xl mx-auto">

    <!-- Header -->
    <div class="bg-white rounded-t-[32px] p-5 shadow-sm border-b">

        <h1 class="font-bold text-xl text-gray-800">
            AI Pendamping
        </h1>

        <p class="text-gray-500 text-sm">
            Ceritakan apa yang sedang kamu rasakan.
        </p>

    </div>

    <!-- Chat Area -->
    <div
        id="chat-box"
        class="bg-white h-[500px] overflow-y-auto p-5 space-y-4">

        @if($messages->count() == 0)

            <div class="flex justify-start">

                <div
                    class="max-w-md bg-teal-50 text-gray-700 px-5 py-3 rounded-3xl">

                    Halo 👋

                    Aku adalah AI Pendamping RuangBK.

                    Kamu bisa bercerita tentang stres, kecemasan,
                    pertemanan, keluarga, maupun hal lain yang sedang
                    kamu rasakan.

                </div>

            </div>

        @endif

        @foreach($messages as $message)

            @if($message->sender == 'user')

                <div class="flex justify-end">

                    <div
                        class="max-w-md bg-teal-500 text-white px-5 py-3 rounded-3xl">

                        {{ $message->message }}

                    </div>

                </div>

            @else

                <div class="flex justify-start">

                    <div
                        class="max-w-md bg-slate-100 text-gray-700 px-5 py-3 rounded-3xl">

                        🤖 {{ $message->message }}

                    </div>

                </div>

            @endif

        @endforeach

    </div>

    <!-- Input -->
    <form
        action="{{ route('student.ai.send') }}"
        method="POST"
        class="bg-white p-4 rounded-b-[32px] shadow-sm border-t flex gap-3">

        @csrf

        <input
            type="text"
            name="message"
            placeholder="Tulis ceritamu di sini..."
            class="flex-1 border border-slate-300 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-teal-500"
            required>

        <button
            type="submit"
            class="bg-teal-500 hover:bg-teal-600 text-white px-6 py-3 rounded-2xl transition">

            Kirim

        </button>

    </form>

</div>

<script>

    const chatBox =
        document.getElementById('chat-box');

    chatBox.scrollTop =
        chatBox.scrollHeight;

</script>

@endsection
