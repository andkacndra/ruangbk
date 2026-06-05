@extends('layouts.admin')

@section('content')
<div class="space-y-8">

    {{-- Success Alert --}}
    @if(session('success'))
    <div id="successAlert"
        class="bg-green-100 border border-green-200
        text-green-700 px-5 py-4 rounded-2xl
        flex items-center justify-between shadow-sm">

        <span>
            {{ session('success') }}
        </span>

        <button
            onclick="document.getElementById('successAlert').remove()"
            class="text-green-500 hover:text-green-700">

            ✕
        </button>
    </div>
    @endif

    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                Kelola Akun
            </h1>

            <p class="text-gray-500">
                Kelola akun siswa dan guru BK
            </p>
        </div>

        <a href="{{ route('admin.users.create') }}"
            class="bg-teal-500 hover:bg-teal-600 text-white px-5 py-3 rounded-2xl transition shadow-sm">

            + Tambah Akun
        </a>
    </div>

    {{-- Filter + Search --}}
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">

        {{-- Filter --}}
        <div class="bg-white p-4 rounded-3xl shadow-sm flex gap-3 flex-wrap">

            <a href="{{ route('admin.users.index') }}"
                class="px-4 py-2 rounded-xl transition
                {{ request('role') == null
                    ? 'bg-teal-500 text-white'
                    : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">

                Semua
            </a>

            <a href="{{ route('admin.users.index', ['role' => 'siswa']) }}"
                class="px-4 py-2 rounded-xl transition
                {{ request('role') == 'siswa'
                    ? 'bg-teal-500 text-white'
                    : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">

                Siswa
            </a>

            <a href="{{ route('admin.users.index', ['role' => 'guru']) }}"
                class="px-4 py-2 rounded-xl transition
                {{ request('role') == 'guru'
                    ? 'bg-teal-500 text-white'
                    : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">

                Guru BK
            </a>

        </div>

        {{-- Search --}}
        <form method="GET"
            action="{{ route('admin.users.index') }}">

            <div class="relative">

                <input type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari nama atau email..."
                    class="w-full lg:w-80 border border-gray-200
                    rounded-2xl px-4 py-3 pr-10
                    focus:outline-none focus:ring-2
                    focus:ring-teal-500">

            </div>

        </form>

    </div>

    {{-- Table --}}
    <div class="bg-white rounded-3xl shadow-sm overflow-hidden">

        <div class="overflow-x-auto">
            <table class="w-full">

                <thead class="bg-gray-50 border-b">
                    <tr class="text-left text-gray-600 text-sm">

                        <th class="px-6 py-4">
                            Nama
                        </th>

                        <th class="px-6 py-4">
                            Email
                        </th>

                        <th class="px-6 py-4">
                            Role
                        </th>

                        <th class="px-6 py-4">
                            Kelas / Jurusan
                        </th>

                        <th class="px-6 py-4 text-center">
                            Aksi
                        </th>

                    </tr>
                </thead>

                <tbody>

                    @forelse($users as $user)
                    <tr class="border-b hover:bg-gray-50 transition">

                        {{-- Nama --}}
                        <td class="px-6 py-5">
                            <div>
                                <p class="font-semibold text-gray-800">
                                    {{ $user->name }}
                                </p>

                                <p class="text-sm text-gray-400">
                                    {{ $user->phone ?? '-' }}
                                </p>
                            </div>
                        </td>

                        {{-- Email --}}
                        <td class="px-6 py-5 text-gray-600">
                            {{ $user->email }}
                        </td>

                        {{-- Role --}}
                        <td class="px-6 py-5">

                            @if($user->hasRole('guru'))
                                <span class="px-3 py-1 rounded-full text-sm bg-blue-100 text-blue-700">
                                    Guru BK
                                </span>

                            @elseif($user->hasRole('siswa'))
                                <span class="px-3 py-1 rounded-full text-sm bg-teal-100 text-teal-700">
                                    Siswa
                                </span>
                            @endif

                        </td>

                        {{-- Kelas / Jurusan --}}
                        <td class="px-6 py-5 text-gray-600">

                            @if($user->hasRole('siswa'))

                                {{ $user->kelas ?? '-' }}

                                <br>

                                <span class="text-sm text-gray-400">
                                    {{ $user->jurusan ?? '-' }}
                                </span>

                            @else
                                -
                            @endif

                        </td>

                        {{-- Aksi --}}
                        <td class="px-6 py-5">

                            <div class="flex justify-center gap-2">

                                <a href="{{ route('admin.users.edit', $user) }}"
                                    class="px-4 py-2 rounded-xl bg-yellow-100 text-yellow-700 hover:bg-yellow-200 transition">

                                    Edit
                                </a>

                                <form action="{{ route('admin.users.destroy', $user) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin hapus akun?')">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="px-4 py-2 rounded-xl bg-red-100 text-red-700 hover:bg-red-200 transition">

                                        Hapus
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty
                    <tr>
                        <td colspan="5"
                            class="text-center py-10 text-gray-400">

                            Belum ada akun
                        </td>
                    </tr>
                    @endforelse

                </tbody>

            </table>
        </div>

        {{-- Pagination --}}
        <div class="p-6 border-t">
            {{ $users->links() }}
        </div>

    </div>

</div>
@endsection
