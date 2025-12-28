<x-guest-layout>
    <div class="mb-8 text-center">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-amber-100 rounded-full mb-4">
            <svg class="w-8 h-8 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
            </svg>
        </div>
        <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Gusto Reservation</h2>
        <p class="text-sm text-slate-500 mt-2">Masuk untuk memesan meja favorit Anda</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf
        <div>
            <label class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-2">Email Restoran</label>
            <input id="email" type="email" name="email" :value="old('email')" required autofocus
                class="w-full px-4 py-3 rounded-xl border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all outline-none"
                placeholder="email@anda.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <div class="flex justify-between mb-2">
                <label class="block text-xs font-bold uppercase tracking-widest text-slate-500">Kata Sandi</label>
                <a class="text-xs font-bold text-amber-600 hover:text-amber-700"
                    href="{{ route('password.request') }}">Lupa?</a>
            </div>
            <input id="password" type="password" name="password" required
                class="w-full px-4 py-3 rounded-xl border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all outline-none"
                placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <button type="submit"
            class="w-full py-4 bg-slate-900 hover:bg-black text-white rounded-xl font-bold shadow-xl transition-all active:scale-[0.98]">
            Buka Menu Reservasi
        </button>
    </form>
</x-guest-layout>
