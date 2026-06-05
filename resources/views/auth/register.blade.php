<x-guest-layout>

    <div class="bg-white rounded-[32px] shadow-lg p-8">

        <div class="text-center mb-8">

            <h2 class="text-3xl font-bold text-gray-800">
                Daftar Akun RuangBK
            </h2>

            <p class="text-gray-500 mt-2">
                Buat akun siswa untuk mulai konseling
            </p>

        </div>

        <form method="POST" action="{{ route('register') }}">

            @csrf

            {{-- Nama Lengkap --}}
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Nama Lengkap
                </label>

                <input
                    id="name"
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    autofocus
                    class="w-full rounded-2xl border-gray-300 focus:border-teal-500 focus:ring-teal-500">

                <x-input-error
                    :messages="$errors->get('name')"
                    class="mt-2" />

            </div>

            {{-- Email --}}
            <div class="mt-5">

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Email
                </label>

                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    class="w-full rounded-2xl border-gray-300 focus:border-teal-500 focus:ring-teal-500">

                <x-input-error
                    :messages="$errors->get('email')"
                    class="mt-2" />

            </div>

            {{-- Nomor HP --}}
            <div class="mt-5">

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Nomor HP
                </label>

                <input
                    id="phone"
                    type="text"
                    name="phone"
                    value="{{ old('phone') }}"
                    required
                    class="w-full rounded-2xl border-gray-300 focus:border-teal-500 focus:ring-teal-500">

                <x-input-error
                    :messages="$errors->get('phone')"
                    class="mt-2" />

            </div>

            {{-- Jenis Kelamin --}}
            <div class="mt-5">

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Jenis Kelamin
                </label>

                <select
                    name="gender"
                    required
                    class="w-full rounded-2xl border-gray-300 focus:border-teal-500 focus:ring-teal-500">

                    <option value="">
                        Pilih Jenis Kelamin
                    </option>

                    <option value="laki-laki"
                        {{ old('gender') == 'laki-laki' ? 'selected' : '' }}>
                        Laki-Laki
                    </option>

                    <option value="perempuan"
                        {{ old('gender') == 'perempuan' ? 'selected' : '' }}>
                        Perempuan
                    </option>

                </select>

                <x-input-error
                    :messages="$errors->get('gender')"
                    class="mt-2" />

            </div>

            {{-- Kelas --}}
            <div class="mt-5">

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Kelas
                </label>

                <input
                    id="kelas"
                    type="text"
                    name="kelas"
                    value="{{ old('kelas') }}"
                    required
                    class="w-full rounded-2xl border-gray-300 focus:border-teal-500 focus:ring-teal-500">

                <x-input-error
                    :messages="$errors->get('kelas')"
                    class="mt-2" />

            </div>

            {{-- Jurusan --}}
            <div class="mt-5">

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Jurusan
                </label>

                <input
                    id="jurusan"
                    type="text"
                    name="jurusan"
                    value="{{ old('jurusan') }}"
                    required
                    class="w-full rounded-2xl border-gray-300 focus:border-teal-500 focus:ring-teal-500">

                <x-input-error
                    :messages="$errors->get('jurusan')"
                    class="mt-2" />

            </div>

            {{-- Password --}}
            <div class="mt-5">

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Password
                </label>

                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    class="w-full rounded-2xl border-gray-300 focus:border-teal-500 focus:ring-teal-500">

                <x-input-error
                    :messages="$errors->get('password')"
                    class="mt-2" />

            </div>

            {{-- Konfirmasi Password --}}
            <div class="mt-5">

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Konfirmasi Password
                </label>

                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    required
                    class="w-full rounded-2xl border-gray-300 focus:border-teal-500 focus:ring-teal-500">

                <x-input-error
                    :messages="$errors->get('password_confirmation')"
                    class="mt-2" />

            </div>

            {{-- Tombol Daftar --}}
            <button
                type="submit"
                class="w-full mt-8 bg-teal-500 hover:bg-teal-600 text-white py-3 rounded-2xl font-semibold transition">

                Daftar Sekarang
            </button>

            {{-- Login --}}
            <div class="text-center mt-6">

                <span class="text-gray-500 text-sm">
                    Sudah punya akun?
                </span>

                <a
                    href="{{ route('login') }}"
                    class="text-teal-600 font-semibold hover:underline">

                    Masuk
                </a>

            </div>

        </form>

    </div>

</x-guest-layout>
