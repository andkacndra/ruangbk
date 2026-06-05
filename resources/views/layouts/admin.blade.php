<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - RuangBK</title>
    <script src="https://unpkg.com/lucide@latest"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
                Panel Admin
            </p>

        </div>

        <nav class="space-y-3">

            <a href="{{ route('admin.dashboard') }}"
            class="flex items-center gap-3 px-5 py-4 rounded-2xl transition
            {{ request()->routeIs('admin.dashboard')
                ? 'bg-teal-500 text-white shadow-md'
                : 'text-gray-600 hover:bg-gray-100' }}">

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

            <a href="{{ route('admin.articles.index') }}"
            class="flex items-center gap-3 px-5 py-4 rounded-2xl transition
            {{ request()->routeIs('admin.articles.*')
                ? 'bg-teal-500 text-white shadow-md'
                : 'text-gray-600 hover:bg-gray-100' }}">

                {{-- Icon Artikel (tetap yang baru) --}}
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

                <span>Kelola Artikel</span>
            </a>

            <a href="{{ route('admin.users.index') }}"
            class="flex items-center gap-3 px-5 py-4 rounded-2xl transition
            {{ request()->routeIs('admin.users.*')
                ? 'bg-teal-500 text-white shadow-md'
                : 'text-gray-600 hover:bg-gray-100' }}">

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

                <span>Kelola Akun</span>
            </a>

        </nav>

    </aside>

    <!-- Content -->
    <main class="flex-1 flex flex-col">

        <!-- Top Navbar -->
        <header class="bg-white px-8 py-5 shadow-sm flex items-center justify-between">

            <div>

                <h1 class="text-2xl font-bold text-slate-800">
                    Admin
                </h1>

                <p class="text-sm text-slate-500">
                    Selamat datang, {{ auth()->user()->name }}
                </p>

            </div>

            <div class="flex items-center gap-4">

                <div class="text-right">

                    <h3 class="font-semibold text-slate-800">
                        {{ auth()->user()->name }}
                    </h3>

                    <p class="text-sm text-slate-500">
                        Administrator
                    </p>

                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        class="bg-red-500 hover:bg-red-600 text-white px-5 py-3 rounded-2xl transition">

                        Logout
                    </button>

                </form>

            </div>

        </header>

        <!-- Page Content -->
        <div class="p-8">

            @yield('content')

        </div>

    </main>

</div>

</body>
</html>
