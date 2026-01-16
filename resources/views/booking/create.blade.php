<x-app-layout>
    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-5xl mx-auto px-6">

            <div class="mb-8">
                <a href="{{ route('dashboard') }}"
                    class="text-slate-400 hover:text-slate-900 font-black text-[10px] uppercase tracking-[0.3em] flex items-center transition-all">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Kembali Pilih Meja
                </a>
            </div>

            <div
                class="bg-white rounded-[3.5rem] shadow-2xl overflow-hidden border border-slate-100 flex flex-col md:flex-row shadow-amber-100/20">

                <div
                    class="md:w-1/3 bg-slate-900 p-12 text-white flex flex-col justify-between relative overflow-hidden">
                    <div class="relative z-10">
                        <span
                            class="text-amber-500 font-black text-[10px] uppercase tracking-[0.4em] mb-4 block">Konfirmasi
                            Pilihan</span>
                        <h2 class="text-4xl font-black mb-8 leading-tight tracking-tight">{{ $facility->name }}</h2>

                        <div class="space-y-6">
                            <div class="flex items-center space-x-4 group">
                                <div
                                    class="w-10 h-10 bg-white/5 rounded-xl flex items-center justify-center group-hover:bg-amber-500 transition-colors">
                                    📍</div>
                                <div>
                                    <p class="text-[9px] text-slate-500 uppercase font-black tracking-widest">Area</p>
                                    <p class="text-sm font-bold">{{ $facility->location }}</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4 group">
                                <div
                                    class="w-10 h-10 bg-white/5 rounded-xl flex items-center justify-center group-hover:bg-amber-500 transition-colors">
                                    👥</div>
                                <div>
                                    <p class="text-[9px] text-slate-500 uppercase font-black tracking-widest">Kapasitas
                                    </p>
                                    <p class="text-sm font-bold">Hingga {{ $facility->capacity }} Tamu</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4 group">
                                <div
                                    class="w-10 h-10 bg-white/5 rounded-xl flex items-center justify-center group-hover:bg-amber-500 transition-colors">
                                    📅</div>
                                <div>
                                    <p class="text-[9px] text-slate-500 uppercase font-black tracking-widest">Tanggal
                                    </p>
                                    <p class="text-sm font-bold">
                                        {{ \Carbon\Carbon::parse($selectedDate)->translatedFormat('d F Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="relative z-10 mt-12 pt-8 border-t border-slate-800">
                        <p class="text-[10px] text-slate-500 uppercase font-black mb-1 tracking-widest">Harga Per Jam
                        </p>
                        <p class="text-3xl font-black text-amber-500 tracking-tighter">Rp
                            {{ number_format($facility->price_per_hour, 0, ',', '.') }}</p>
                    </div>

                    <div class="absolute -right-20 -bottom-20 w-64 h-64 bg-amber-500/10 rounded-full blur-3xl"></div>
                </div>

                <div class="md:w-2/3 p-12 lg:p-20 bg-white">
                    <form action="{{ route('booking.store') }}" method="POST" class="space-y-10">
                        @csrf
                        <input type="hidden" name="facility_id" value="{{ $facility->id }}">
                        <input type="hidden" name="reservation_date" value="{{ $selectedDate }}">
                        <input type="hidden" name="total_price" value="{{ $facility->price_per_hour }}">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <div class="space-y-3">
                                <label
                                    class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Jam
                                    Kedatangan</label>
                                <input type="time" name="start_time" required
                                    class="w-full bg-slate-50 border-2 border-slate-100 rounded-2xl p-4 focus:ring-4 focus:ring-amber-500/10 focus:border-amber-500 outline-none transition-all font-bold text-slate-700">
                            </div>
                            <div class="space-y-3">
                                <label
                                    class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Jumlah
                                    Tamu</label>
                                <div class="relative">
                                    <select name="guest_count"
                                        class="w-full bg-slate-50 border-2 border-slate-100 rounded-2xl p-4 focus:ring-4 focus:ring-amber-500/10 focus:border-amber-500 outline-none transition-all font-bold text-slate-700 appearance-none">
                                        @for ($i = 1; $i <= $facility->capacity; $i++)
                                            <option value="{{ $i }}">{{ $i }} Orang</option>
                                        @endfor
                                    </select>
                                    <div
                                        class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-slate-300">
                                        ▼</div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-amber-50 p-6 rounded-[2rem] border border-amber-100/50">
                            <div class="flex items-center space-x-3 text-amber-700 mb-2">
                                <span class="text-lg">✨</span>
                                <p class="text-[11px] font-black uppercase tracking-widest">Informasi Penting</p>
                            </div>
                            <p class="text-[12px] text-amber-800/70 leading-relaxed font-medium">
                                Meja akan disiapkan sesuai jadwal. Mohon datang tepat waktu. Durasi penggunaan meja
                                standar adalah 2 jam.
                            </p>
                        </div>

                        <button type="submit"
                            class="w-full bg-slate-900 hover:bg-black text-white py-6 rounded-[1.5rem] font-black shadow-2xl shadow-slate-200 transition-all uppercase tracking-[0.3em] active:scale-95 transform hover:-translate-y-1">
                            Lanjut ke Pembayaran
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
