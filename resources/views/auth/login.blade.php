<x-guest-layout>

    <div class="bg-white rounded-[32px] shadow-lg p-8">

        <div class="text-center mb-8">

            <h2 class="text-3xl font-bold text-gray-800">
                Masuk ke RuangBK
            </h2>

            <p class="text-gray-500 mt-2">
                Login untuk melanjutkan konseling
            </p>

        </div>

        <x-auth-session-status
            class="mb-4"
            :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">

            @csrf

            {{-- Email / Nomor HP --}}
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Email atau Nomor HP
                </label>

                <input
                    id="login"
                    type="text"
                    name="login"
                    value="{{ old('login') }}"
                    required
                    autofocus
                    class="w-full rounded-2xl border-gray-300 focus:border-teal-500 focus:ring-teal-500">

                <x-input-error
                    :messages="$errors->get('login')"
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

            {{-- Remember Me --}}
            <div class="mt-5 flex items-center">

                <input
                    id="remember_me"
                    type="checkbox"
                    name="remember"
                    class="rounded border-gray-300 text-teal-500 focus:ring-teal-500">

                <label
                    for="remember_me"
                    class="ml-2 text-sm text-gray-600">

                    Ingat Saya
                </label>

            </div>

            {{-- Tombol Login --}}
            <button
                type="submit"
                class="w-full mt-6 bg-teal-500 hover:bg-teal-600 text-white py-3 rounded-2xl font-semibold transition">

                Masuk
            </button>

            {{-- Register --}}
            <div class="text-center mt-6">

                <span class="text-gray-500 text-sm">
                    Belum punya akun?
                </span>

                <a
                    href="{{ route('register') }}"
                    class="text-teal-600 font-semibold hover:underline">

                    Daftar
                </a>

            </div>

        </form>

    </div>

</x-guest-layout>
