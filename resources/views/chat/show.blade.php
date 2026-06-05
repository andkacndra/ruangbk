@extends(
    auth()->user()->hasRole('guru')
        ? 'layouts.teacher'
        : 'layouts.student'
)

@section('content')

<div class="h-[85vh] flex flex-col">

    <!-- Header -->
    <div class="bg-white rounded-t-[32px] p-5 shadow-sm border-b">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="font-bold text-xl">
                    Konseling
                </h1>

                @if(auth()->user()->hasRole('siswa'))

                    <p class="text-gray-500 text-sm">
                        {{ $session->teacher->name }}
                    </p>

                @else

                    <div class="flex items-center gap-2">

                        <span class="text-gray-600 text-sm">
                            {{ $session->student->name }}
                        </span>

                        <span class="bg-teal-100 text-teal-700 px-2 py-1 rounded-full text-xs mt-1">
                            {{ $session->student->kelas ?? '-' }}
                        </span>

                    </div>

                @endif
            </div>

            @if($session->status === 'accepted')

            <form
                method="POST"
                action="{{ route('chat.complete', $session->id) }}">

                @csrf
                @method('PATCH')

                <button
                    onclick="return confirm('Akhiri sesi konseling ini?')"
                    class="
                        bg-red-500
                        hover:bg-red-600
                        text-white
                        px-5
                        py-2
                        rounded-2xl
                        transition">

                    Akhiri

                </button>

            </form>

            @endif

        </div>

    </div>

    <!-- Chat -->
    <div id="chat-box" class="flex-1 bg-gray-50 overflow-y-auto p-5 space-y-4">

        @foreach($messages as $message)

            <div class="
                flex
                {{ $message->sender_id == auth()->id()
                    ? 'justify-end'
                    : 'justify-start'
                }}
            ">

                <div class="
                    max-w-[75%]
                    rounded-[24px]
                    px-5 py-3 shadow-sm

                    {{ $message->sender_id == auth()->id()
                        ? 'bg-teal-500 text-white'
                        : 'bg-white'
                    }}
                ">

                    <p>
                        {{ $message->message }}
                    </p>

                    <div class="text-xs mt-2 opacity-70 flex items-center gap-1">

                        {{ $message->created_at->format('H:i') }}

                    </div>
                </div>
            </div>

        @endforeach

    </div>

    <!-- Input -->
    @if($session->status == 'accepted')

        <form
            method="POST"
            action="{{ route('chat.send', $session->id) }}"
            class="bg-white rounded-b-[32px] p-4 flex gap-3">

            @csrf

            <input
                type="text"
                name="message"
                placeholder="Tulis pesan..."
                class="flex-1 border border-gray-300 rounded-2xl px-5 py-4 focus:ring-2 focus:ring-teal-500"
                required
            >

            <button
                class="bg-teal-500 hover:bg-teal-600 text-white px-6 rounded-2xl transition">

                Kirim
            </button>

        </form>

    @else

        <div class="bg-white p-5 text-center text-gray-500 rounded-b-[32px]">
            Chat tidak aktif.
        </div>

    @endif

</div>

<script>

document.addEventListener('DOMContentLoaded', () => {

    const chatBox =
        document.getElementById(
            'chat-box'
        );

    // saat buka chat langsung ke bawah
    chatBox.scrollTop =
        chatBox.scrollHeight;

    Echo.private('chat.{{ $session->id }}')
        .listen('.message.sent', (e) => {

            const mine =
                e.message.sender_id ==
                {{ auth()->id() }};

            const bubble = `
                <div class="flex ${
                    mine
                    ? 'justify-end'
                    : 'justify-start'
                }">

                    <div class="
                        max-w-[75%]
                        rounded-[24px]
                        px-5 py-3 shadow-sm
                        ${
                            mine
                            ? 'bg-teal-500 text-white'
                            : 'bg-white'
                        }">

                        <p>${e.message.message}</p>

                        <div class="text-xs mt-2 opacity-70">
                            ${new Date().toLocaleTimeString([], {
                                hour: '2-digit',
                                minute: '2-digit'
                            })}
                        </div>

                    </div>
                </div>
            `;

            chatBox.insertAdjacentHTML(
                'beforeend',
                bubble
            );

            // auto scroll ke pesan terbaru
            chatBox.scrollTop =
                chatBox.scrollHeight;
        });

});

</script>

@endsection
