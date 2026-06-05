@extends('layouts.student')

@section('content')
<div class="space-y-8">

    {{-- Header --}}
    <div>
        <h1 class="text-3xl font-bold text-gray-800">
            Edit Profil
        </h1>

        <p class="text-gray-500">
            Perbarui informasi akun kamu
        </p>
    </div>

    {{-- Card --}}
    <div class="bg-white rounded-3xl shadow-sm p-8">

        <form action="{{ route('student.profile.update') }}"
            method="POST"
            class="space-y-6">

            @csrf
            @method('PUT')

            <div class="grid md:grid-cols-2 gap-6">

                {{-- Nama --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Lengkap
                    </label>

                    <input type="text"
                        name="name"
                        value="{{ old('name', $user->name) }}"
                        class="w-full border border-gray-200
                        rounded-2xl px-4 py-3
                        focus:ring-2 focus:ring-teal-500
                        outline-none"
                        required>
                </div>

                {{-- Email --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Email
                    </label>

                    <input type="email"
                        name="email"
                        value="{{ old('email', $user->email) }}"
                        class="w-full border border-gray-200
                        rounded-2xl px-4 py-3
                        focus:ring-2 focus:ring-teal-500
                        outline-none"
                        required>
                </div>

                {{-- Nomor HP --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Nomor HP
                    </label>

                    <input type="text"
                        name="phone"
                        value="{{ old('phone', $user->phone) }}"
                        class="w-full border border-gray-200
                        rounded-2xl px-4 py-3
                        focus:ring-2 focus:ring-teal-500
                        outline-none">
                </div>

                {{-- Gender --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Jenis Kelamin
                    </label>

                    <select name="gender"
                        class="w-full border border-gray-200
                        rounded-2xl px-4 py-3
                        focus:ring-2 focus:ring-teal-500
                        outline-none">

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

                {{-- Kelas --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Kelas
                    </label>

                    <input type="text"
                        name="kelas"
                        value="{{ old('kelas', $user->kelas) }}"
                        class="w-full border border-gray-200
                        rounded-2xl px-4 py-3
                        focus:ring-2 focus:ring-teal-500
                        outline-none">
                </div>

                {{-- Jurusan --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Jurusan
                    </label>

                    <input type="text"
                        name="jurusan"
                        value="{{ old('jurusan', $user->jurusan) }}"
                        class="w-full border border-gray-200
                        rounded-2xl px-4 py-3
                        focus:ring-2 focus:ring-teal-500
                        outline-none">
                </div>

            </div>

            {{-- Button --}}
            <div class="flex gap-4 pt-4">

                <button type="submit"
                    class="bg-teal-500 hover:bg-teal-600
                    text-white px-6 py-3 rounded-2xl
                    transition shadow-sm">

                    Simpan Perubahan
                </button>

                <a href="{{ route('student.profile') }}"
                    class="bg-gray-100 hover:bg-gray-200
                    text-gray-700 px-6 py-3 rounded-2xl
                    transition">

                    Batal
                </a>

            </div>

        </form>

    </div>

</div>
@endsection
