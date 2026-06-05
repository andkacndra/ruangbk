<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>RuangBK</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50">

    {{-- Navbar --}}
    <nav class="bg-white border-b border-slate-200 sticky top-0 z-50">

        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

            <div>
                <h1 class="text-3xl font-bold text-teal-600">
                    RuangBK
                </h1>

                <p class="text-xs text-slate-500">
                    Tempat Aman Untuk Bercerita
                </p>
            </div>

            <div class="flex gap-3">

                <a
                    href="{{ route('login') }}"
                    class="px-5 py-2 rounded-xl border border-teal-500 text-teal-600 hover:bg-teal-50 transition">

                    Login
                </a>

                <a
                    href="{{ route('register') }}"
                    class="px-5 py-2 rounded-xl bg-teal-500 text-white hover:bg-teal-600 transition">

                    Daftar
                </a>

            </div>

        </div>

    </nav>

    {{-- Hero --}}
    <section class="max-w-7xl mx-auto px-6 py-20">

        <div class="grid lg:grid-cols-2 gap-12 items-center mt-5">

            <div>

                <span class="bg-teal-100 text-teal-700 px-4 py-2 rounded-full text-sm">
                    Platform Konseling Siswa
                </span>

                <h1 class="text-5xl font-bold text-slate-800 mt-6 leading-tight">

                    Cerita Lebih Nyaman Bersama
                    <span class="text-teal-500">
                        RuangBK
                    </span>

                </h1>

                <p class="text-slate-600 mt-6 text-lg leading-relaxed">

                    RuangBK membantu siswa melakukan konseling secara online,
                    memantau kondisi mental, membaca artikel edukatif,
                    dan berkomunikasi langsung dengan Guru BK secara aman.

                </p>

                <div class="flex gap-4 mt-8">

                    <a
                        href="{{ route('register') }}"
                        class="bg-teal-500 hover:bg-teal-600 text-white px-6 py-4 rounded-2xl transition">

                        Mulai Sekarang
                    </a>

                    <a
                        href="{{ route('login') }}"
                        class="border border-slate-300 hover:bg-slate-100 px-6 py-4 rounded-2xl transition">

                        Login
                    </a>

                </div>

            </div>

            <div>

                <div class="flex justify-center">
                    <img
                        src="{{ asset('images/hero-ruangbk.png') }}"
                        alt="Ilustrasi Konseling"
                        class="w-full max-w-[550px] animate-float"
                    >
                </div>

            </div>

        </div>

    </section>

    {{-- Fitur --}}
    <section class="max-w-7xl mx-auto px-6 pb-20 mt-5">

        <h2 class="text-4xl font-bold text-center text-slate-800 mb-12">
            Fitur Utama
        </h2>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">

            <div class="bg-white rounded-3xl p-6 shadow-sm">
                <div class="text-5xl mb-4">
                    📅
                </div>

                <h3 class="font-bold text-lg">
                    Booking Konseling
                </h3>

                <p class="text-slate-500 mt-2">
                    Pilih guru BK dan jadwal konseling sesuai kebutuhan.
                </p>
            </div>

            <div class="bg-white rounded-3xl p-6 shadow-sm">
                <div class="text-5xl mb-4">
                    💬
                </div>

                <h3 class="font-bold text-lg">
                    Live Chat
                </h3>

                <p class="text-slate-500 mt-2">
                    Konseling online secara realtime dengan Guru BK.
                </p>
            </div>

            <div class="bg-white rounded-3xl p-6 shadow-sm">
                <div class="text-5xl mb-4">
                    🧠
                </div>

                <h3 class="font-bold text-lg">
                    Tes Mental
                </h3>

                <p class="text-slate-500 mt-2">
                    Mengukur kondisi mental siswa secara mandiri.
                </p>
            </div>

            <div class="bg-white rounded-3xl p-6 shadow-sm">
                <div class="text-5xl mb-4">
                    📚
                </div>

                <h3 class="font-bold text-lg">
                    Artikel Edukasi
                </h3>

                <p class="text-slate-500 mt-2">
                    Informasi dan edukasi kesehatan mental siswa.
                </p>
            </div>

        </div>

    </section>

    {{-- Footer --}}
    <footer class="bg-slate-900 text-white py-8">

        <div class="max-w-7xl mx-auto px-6 text-center">

            <h3 class="text-2xl font-bold text-teal-400">
                RuangBK
            </h3>

            <p class="text-slate-400 mt-2">
                Platform Konseling Online untuk Siswa dan Guru BK
            </p>

        </div>

    </footer>

</body>
</html>
