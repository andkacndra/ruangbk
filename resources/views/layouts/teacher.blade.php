<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>RuangBK - Guru BK</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>

<body class="bg-slate-100 min-h-screen">

<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="hidden lg:flex flex-col w-72 bg-white shadow-lg p-6">

        <div class="mb-10">
            <h1 class="text-3xl font-bold text-teal-600">
                RuangBK
            </h1>

            <p class="text-gray-500 text-sm mt-1">
                Panel Guru BK
            </p>
        </div>

        <nav class="space-y-3">

            <a href="{{ route('teacher.dashboard') }}"
                class="flex items-center gap-3 p-4 rounded-2xl transition
                {{ request()->routeIs('teacher.dashboard')
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

            <a href="{{ route('teacher.chats') }}"
                class="flex items-center gap-3 p-4 rounded-2xl transition
                {{ request()->routeIs('teacher.chats')
                    || request()->routeIs('chat.show')
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
                        d="M8 10h8m-8 4h5m-7 6l-4 1 1-4V5a2 2 0 012-2h14a2 2 0 012 2v10a2 2 0 01-2 2H8l-4 4z"/>
                </svg>
                <span>Chat Konseling</span>
            </a>

            <a href="{{ route('teacher.bookings') }}"
                class="flex items-center gap-3 p-4 rounded-2xl transition
                {{ request()->routeIs('teacher.bookings')
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
                <span>Booking</span>
            </a>

        </nav>

    </aside>

    <!-- Main -->
    <main class="flex-1 flex flex-col">

        <header class="bg-white shadow-sm px-5 py-4 flex items-center justify-between">

            <div>

                <h2 class="font-bold text-lg text-gray-800">
                    Halo, {{ auth()->user()->name }} 👋
                </h2>

                <p class="text-sm text-gray-500">
                    Dashboard Guru BK
                </p>

            </div>
            <div class="flex items-center gap-3">

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl transition">
                        Logout
                    </button>
                </form>

            </div>

        </header>

        <section class="p-5 pb-25 lg:pb-5">

            @yield('content')

        </section>

    </main>

</div>

<nav
    class="
        fixed
        bottom-0
        left-0
        right-0
        bg-white
        shadow-2xl
        border-t
        lg:hidden">

    <div class="grid grid-cols-3">
        <a href="{{ route('teacher.dashboard') }}"
        class="flex items-center gap-3 px-5 py-4 rounded-2xl transition
        {{ request()->routeIs('teacher.dashboard') ? 'bg-teal-500 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
            🏠 Dashboard
        </a>

        <a href="{{ route('teacher.chats') }}"
        class="flex items-center gap-3 px-5 py-4 rounded-2xl transition
        {{ request()->routeIs('teacher.chats') ? 'bg-teal-500 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
            💬 Chat Konseling
        </a>

        <a href="{{ route('teacher.bookings') }}"
        class="flex items-center gap-3 px-5 py-4 rounded-2xl transition
        {{ request()->routeIs('teacher.bookings') ? 'bg-teal-500 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
            📅 Booking
        </a>
    </div>

</nav>

</body>
</html>
