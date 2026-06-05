<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <meta
        name="user-id"
        content="{{ auth()->id() }}">

    <title>RuangBK</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>
<body class="bg-slate-100 min-h-screen">

<div class="flex min-h-screen">

    <!-- Sidebar Desktop -->
    <aside class="hidden lg:flex flex-col w-72 bg-white shadow-lg p-6">

        <!-- Logo -->
        <div class="mb-10">
            <h1 class="text-3xl font-bold text-teal-600">
                RuangBK
            </h1>

            <p class="text-gray-500 text-sm mt-1">
                Ruang aman untuk cerita
            </p>
        </div>

        <!-- Menu -->
        <nav class="space-y-3">

            <a href="/student/dashboard"
                class="flex items-center gap-3 p-4 rounded-2xl transition
                {{ request()->is('student/dashboard')
                    ? 'bg-teal-500 text-white'
                    : 'hover:bg-teal-50 text-gray-700' }}">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M3 10.5L12 3l9 7.5V21H3V10.5z"/>
                </svg>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('student.counseling') }}"
                class="flex items-center gap-3 p-4 rounded-2xl transition
                {{ request()->routeIs('student.counseling')
                    || request()->routeIs('student.counseling.show')
                    ? 'bg-teal-500 text-white'
                    : 'hover:bg-teal-50 text-gray-700' }}">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span>Konseling</span>
            </a>

            <a href="{{ route('student.history') }}"
                class="flex items-center gap-3 p-4 rounded-2xl transition
                {{ request()->routeIs('student.history')
                    ? 'bg-teal-500 text-white'
                    : 'hover:bg-teal-50 text-gray-700' }}">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>Riwayat Konseling</span>
            </a>

            <a href="{{ route('student.mental-test') }}"
                class="flex items-center gap-3 p-4 rounded-2xl transition
                {{ request()->routeIs('student.mental-test')
                    ? 'bg-teal-500 text-white'
                    : 'hover:bg-teal-50 text-gray-700' }}">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 3l7 4v5c0 5-3.5 8-7 9-3.5-1-7-4-7-9V7l7-4z"/>
                </svg>
                <span>Tes Mental</span>
            </a>

            <a href="{{ route('student.articles') }}"
                class="flex items-center gap-3 p-4 rounded-2xl transition
                {{ request()->routeIs('student.articles')
                    ? 'bg-teal-500 text-white'
                    : 'hover:bg-teal-50 text-gray-700' }}">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M19 21H9a2 2 0 01-2-2V5a2 2 0 012-2h10a2 2 0 012 2v14a2 2 0 01-2 2zM7 7H5a2 2 0 00-2 2v10a2 2 0 002 2h2" />
                </svg>
                <span>Artikel</span>
            </a>

            <a href="{{ route('student.profile') }}"
                class="flex items-center gap-3 p-4 rounded-2xl transition
                {{ request()->routeIs('student.profile*')
                    ? 'bg-teal-500 text-white'
                    : 'hover:bg-teal-50 text-gray-700' }}">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M15.75 6.75a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.118a7.5 7.5 0 0115 0A17.933 17.933 0 0112 21.75a17.933 17.933 0 01-7.5-1.632z" />
                </svg>
                <span>Profil</span>
            </a>

        </nav>

        <!-- Logout -->
        <div class="mt-auto">

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit"
                    class="w-full bg-red-500 hover:bg-red-600 text-white py-3 rounded-2xl transition">

                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col">

        <!-- Navbar -->
        <header class="bg-white shadow-sm px-5 py-4 flex items-center justify-between">

            <div>
                <h2 class="font-bold text-lg text-gray-800">
                    Halo, {{ auth()->user()->name }}
                </h2>

                <p class="text-sm text-gray-500">
                    Semoga harimu menyenangkan
                </p>
            </div>

            <div class="flex items-center gap-4">

                <!-- Badge kelas -->
                <div class="
                    bg-teal-100
                    text-teal-700
                    px-5 py-2
                    rounded-full
                    font-medium">

                    {{ auth()->user()->kelas }}

                </div>
            </div>

        </header>

        <!-- Page Content -->
        <section class="p-5 pb-28 lg:pb-5">

            @yield('content')

        </section>

    </main>

</div>

<!-- Bottom Navigation Mobile -->
<nav class="fixed bottom-0 left-0 right-0 bg-white shadow-2xl border-t lg:hidden">

    <div class="grid grid-cols-5">

        <a href="#"
            class="flex flex-col items-center py-3 text-teal-600">

            <span>🏠</span>
            <span class="text-xs">
                Home
            </span>
        </a>

        <a href="#"
            class="flex flex-col items-center py-3 text-gray-500">

            <span>📅</span>
            <span class="text-xs">
                Konseling
            </span>
        </a>

        <a href="#"
            class="flex flex-col items-center py-3 text-gray-500">

            <span>🤖</span>
            <span class="text-xs">
                AI
            </span>
        </a>

        <a href="#"
            class="flex flex-col items-center py-3 text-gray-500">

            <span>📚</span>
            <span class="text-xs">
                Artikel
            </span>
        </a>

        <a href="#"
            class="flex flex-col items-center py-3 text-gray-500">

            <span>👤</span>
            <span class="text-xs">
                Profil
            </span>
        </a>

    </div>

</nav>

</body>
</html>
