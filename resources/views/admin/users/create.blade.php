@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto">

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">
            Tambah Akun
        </h1>

        <p class="text-gray-500">
            Buat akun siswa atau guru BK
        </p>
    </div>

    <div class="bg-white rounded-3xl shadow-sm p-8">

        <form action="{{ route('admin.users.store') }}"
            method="POST"
            class="space-y-6">

            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Nama --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Lengkap
                    </label>

                    <input type="text"
                        name="name"
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
                        required
                        class="w-full border border-gray-200 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-teal-500">
                </div>

                {{-- No HP --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Nomor HP
                    </label>

                    <input type="text"
                        name="phone"
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

                        <option value="laki-laki">
                            Laki-laki
                        </option>

                        <option value="perempuan">
                            Perempuan
                        </option>
                    </select>
                </div>

                {{-- Role --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Role
                    </label>

                    <select name="role"
                        id="role"
                        required
                        class="w-full border border-gray-200 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-teal-500">

                        <option value="">
                            Pilih Role
                        </option>

                        <option value="siswa">
                            Siswa
                        </option>

                        <option value="guru">
                            Guru BK
                        </option>
                    </select>
                </div>

            </div>

            {{-- Khusus siswa --}}
            <div id="studentFields"
                class="hidden grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Kelas
                    </label>

                    <input type="text"
                        name="kelas"
                        class="w-full border border-gray-200 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-teal-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Jurusan
                    </label>

                    <input type="text"
                        name="jurusan"
                        class="w-full border border-gray-200 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-teal-500">
                </div>

            </div>

            {{-- Password --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Password
                    </label>

                    <input type="password"
                        name="password"
                        required
                        class="w-full border border-gray-200 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-teal-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Konfirmasi Password
                    </label>

                    <input type="password"
                        name="password_confirmation"
                        required
                        class="w-full border border-gray-200 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-teal-500">
                </div>

            </div>

            {{-- Button --}}
            <div class="flex justify-end gap-3 pt-4">

                <a href="{{ route('admin.users.index') }}"
                    class="px-5 py-3 rounded-2xl bg-gray-100 text-gray-700 hover:bg-gray-200 transition">

                    Batal
                </a>

                <button type="submit"
                    class="px-5 py-3 rounded-2xl bg-teal-500 hover:bg-teal-600 text-white transition">

                    Simpan Akun
                </button>

            </div>

        </form>

    </div>

</div>

<script>
document.getElementById('role')
.addEventListener('change', function () {

    const studentFields =
        document.getElementById('studentFields');

    if (this.value === 'siswa') {
        studentFields.classList.remove('hidden');
    } else {
        studentFields.classList.add('hidden');
    }
});
</script>
@endsection
