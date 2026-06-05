<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RuangBK</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 min-h-screen">

    <div class="min-h-screen flex">

        {{-- Kiri --}}
        <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-teal-500 to-cyan-500 text-white p-12">

            <div class="flex flex-col justify-center">

                <h1 class="text-5xl font-bold mb-6">
                    RuangBK
                </h1>

                <p class="text-xl leading-relaxed text-teal-50">
                    Platform Konseling Sekolah Digital
                    yang membantu siswa terhubung
                    dengan Guru BK secara mudah,
                    aman dan nyaman.
                </p>

            </div>

        </div>

        {{-- Kanan --}}
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6">

            <div class="w-full max-w-md">

                {{ $slot }}

            </div>

        </div>

    </div>

</body>
</html>
