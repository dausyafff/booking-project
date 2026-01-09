<x-app-layout>
    <div class="py-16 bg-slate-50 min-h-screen">
        <div class="max-w-3xl mx-auto px-6">
            <div class="flex items-center justify-between mb-8">
                <a href="{{ route('dashboard') }}"
                    class="text-slate-400 hover:text-slate-900 font-black text-[10px] uppercase tracking-[0.3em] flex items-center transition-all">
                    ← Kembali
                </a>
                <p class="text-[10px] font-black text-slate-300 uppercase tracking-widest italic">ID:
                    #GSTO-{{ $booking->id }}</p>
            </div>

            <div class="bg-white rounded-[3.5rem] shadow-2xl overflow-hidden border border-slate-100">
                <div class="bg-slate-900 p-12 text-white text-center relative overflow-hidden">
                    <h2 class="text-4xl font-black tracking-tight relative z-10">{{ $booking->facility->name }}</h2>
                    <div class="mt-4 flex justify-center space-x-4 relative z-10">
                        <span
                            class="px-4 py-1.5 bg-white/10 rounded-full text-[10px] font-black uppercase tracking-widest">
                            {{ $booking->guest_count }} Tamu
                        </span>
                        <span
                            class="px-4 py-1.5 {{ $booking->status == 'pending' ? 'bg-amber-500' : 'bg-emerald-500' }} rounded-full text-[10px] font-black uppercase tracking-widest text-white">
                            {{ $booking->status }}
                        </span>
                    </div>
                    <div class="absolute top-0 left-0 w-full h-full opacity-5 pointer-events-none">
                        <div class="absolute rotate-45 bg-white w-40 h-40 -left-20 -top-20"></div>
                    </div>
                </div>

                <div class="p-12">
                    <div class="grid grid-cols-2 gap-10 mb-10 border-b border-slate-100 pb-10">
                        <div>
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Tanggal &
                                Waktu</p>
                            <p class="font-bold text-slate-900 text-lg">
                                {{ \Carbon\Carbon::parse($booking->reservation_date)->format('d F Y') }}</p>
                            <p class="text-sm font-medium text-slate-500">{{ $booking->start_time }} -
                                {{ $booking->end_time }}</p>
                        </div>
                        <div class="text-right">
                            <p
                                class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 text-amber-500">
                                Nilai Transaksi</p>
                            <p class="font-black text-3xl text-slate-900 tracking-tighter">Rp
                                {{ number_format($booking->total_price, 0, ',', '.') }}</p>
                        </div>
                    </div>

                    @if ($booking->status == 'pending')
                        <div class="bg-slate-900 text-white rounded-3xl p-8 flex items-center justify-between">
                            <div class="max-w-[60%]">
                                <h4 class="font-black text-sm uppercase tracking-widest mb-2">Segera Bayar</h4>
                                <p class="text-[11px] text-slate-400 leading-relaxed font-medium">Kirim bukti pembayaran
                                    Anda ke WhatsApp Admin Gusto untuk proses konfirmasi instan.</p>
                            </div>
                            <button
                                class="bg-amber-500 hover:bg-amber-600 text-white px-6 py-3 rounded-2xl font-black text-[10px] uppercase tracking-widest shadow-lg transition-all">
                                Kirim Bukti
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
