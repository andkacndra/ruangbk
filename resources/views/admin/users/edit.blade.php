@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto">

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">
            Edit Akun
        </h1>

        <p class="text-gray-500">
            Update data akun pengguna
        </p>
    </div>

    <div class="bg-white rounded-3xl shadow-sm p-8">

        <form action="{{ route('admin.users.update', $user) }}"
            method="POST"
            class="space-y-6">

            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Nama --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Lengkap
                    </label>

                    <input type="text"
                        name="name"
                        value="{{ old('name', $user->name) }}"
                        required
                        class="w-full border border-gray-200 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-teal-500">
                </div>

                {{-- Email --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Email
                    </label>

                    <input type="email"
                        name="email"
                        value="{{ old('email', $user->email) }}"
                        required
                        class="w-full border border-gray-200 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-teal-500">
                </div>

                {{-- Nomor HP --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Nomor HP
                    </label>

                    <input type="text"
                        name="phone"
                        value="{{ old('phone', $user->phone) }}"
                        class="w-full border border-gray-200 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-teal-500">
                </div>

                {{-- Gender --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Jenis Kelamin
                    </label>

                    <select name="gender"
                        class="w-full border border-gray-200 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-teal-500">

                        <option value="">
                            Pilih Jenis Kelamin
                        </option>

                        <option value="laki-laki"
                            {{ $user->gender == 'laki-laki' ? 'selected' : '' }}>
                            Laki-laki
                        </option>

                        <option value="perempuan"
                            {{ $user->gender == 'perempuan' ? 'selected' : '' }}>
                            Perempuan
                        </option>
                    </select>
                </div>

            </div>

            {{-- Khusus siswa --}}
            @if($user->hasRole('siswa'))
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Kelas
                    </label>

                    <input type="text"
                        name="kelas"
                        value="{{ old('kelas', $user->kelas) }}"
                        class="w-full border border-gray-200 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-teal-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Jurusan
                    </label>

                    <input type="text"
                        name="jurusan"
                        value="{{ old('jurusan', $user->jurusan) }}"
                        class="w-full border border-gray-200 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-teal-500">
                </div>

            </div>
            @endif

            {{-- Button --}}
            <div class="flex justify-end gap-3 pt-4">

                <a href="{{ route('admin.users.index') }}"
                    class="px-5 py-3 rounded-2xl bg-gray-100 text-gray-700 hover:bg-gray-200 transition">

                    Batal
                </a>

                <button type="submit"
                    class="px-5 py-3 rounded-2xl bg-teal-500 hover:bg-teal-600 text-white transition">

                    Update Akun
                </button>

            </div>

        </form>

    </div>

</div>
@endsection
