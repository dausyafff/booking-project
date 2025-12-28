<x-guest-layout>
    <div class="mb-8 text-center">
        <h2 class="text-2xl font-bold text-slate-900 tracking-tight">Bergabung dengan Gusto</h2>
        <p class="text-sm text-slate-500 mt-2">Buat akun untuk mulai merencanakan moment spesial Anda</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <div>
            <label for="name" class="block text-sm font-semibold text-slate-700 mb-1.5">Nama Lengkap</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <input id="name" type="text" name="name" :value="old('name')" required autofocus
                    autocomplete="name" placeholder="Masukkan nama lengkap"
                    class="block w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-xl focus:ring-amber-500 focus:border-amber-500 transition-all outline-none" />
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <label for="email" class="block text-sm font-semibold text-slate-700 mb-1.5">Alamat Email</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206" />
                    </svg>
                </div>
                <input id="email" type="email" name="email" :value="old('email')" required
                    autocomplete="username" placeholder="nama@email.com"
                    class="block w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-xl focus:ring-amber-500 focus:border-amber-500 transition-all outline-none" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="password" class="block text-sm font-semibold text-slate-700 mb-1.5">Kata Sandi</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                        placeholder="••••••••"
                        class="block w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-xl focus:ring-amber-500 focus:border-amber-500 transition-all outline-none" />
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div>
                <label for="password_confirmation"
                    class="block text-sm font-semibold text-slate-700 mb-1.5">Konfirmasi</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        autocomplete="new-password" placeholder="••••••••"
                        class="block w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-xl focus:ring-amber-500 focus:border-amber-500 transition-all outline-none" />
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
        </div>

        <div class="pt-2">
            <button type="submit"
                class="w-full bg-slate-900 hover:bg-black text-white font-bold py-3.5 rounded-xl shadow-lg shadow-slate-200 transition-all active:scale-[0.98] flex justify-center items-center">
                Daftar Sekarang
            </button>
        </div>

        <div class="text-center mt-6">
            <p class="text-sm text-slate-500">
                Sudah memiliki akun?
                <a href="{{ route('login') }}" class="text-amber-600 font-bold hover:underline italic">Masuk di sini</a>
            </p>
        </div>
    </form>
</x-guest-layout>
