<x-app-layout>
    <div class="py-20 bg-slate-50 min-h-screen flex items-center">
        <div class="max-w-2xl mx-auto px-6 w-full">
            <div
                class="bg-white rounded-[3.5rem] shadow-2xl overflow-hidden border border-slate-100 text-center p-12 relative">
                <div
                    class="inline-flex items-center px-4 py-2 bg-amber-50 text-amber-600 rounded-full text-[10px] font-black uppercase tracking-widest mb-8">
                    <span class="w-2 h-2 bg-amber-500 rounded-full mr-2 animate-ping"></span>
                    Menunggu Pembayaran
                </div>

                <h2 class="text-4xl font-black text-slate-900 mb-2 tracking-tight">Hampir Selesai!</h2>
                <p class="text-slate-400 font-medium text-sm mb-10">Silahkan selesaikan pembayaran untuk mengamankan meja
                    Anda.</p>

                <div class="bg-slate-50 rounded-[2.5rem] p-10 mb-10 border border-slate-100 text-left">
                    <div class="flex justify-between items-end mb-8">
                        <div>
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Meja Anda</p>
                            <p class="text-2xl font-black text-slate-900">{{ $booking->facility->name }}</p>
                        </div>
                        <div class="text-right">
                            <p
                                class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1 text-amber-500">
                                Total Tagihan</p>
                            <p class="text-3xl font-black text-slate-900">Rp
                                {{ number_format($booking->total_price, 0, ',', '.') }}</p>
                        </div>
                    </div>

                    <div class="space-y-4 pt-8 border-t border-slate-200">
                        <p class="text-[11px] font-black text-slate-500 uppercase tracking-widest">Metode Transfer (BCA)
                        </p>
                        <div
                            class="flex items-center justify-between bg-white p-6 rounded-3xl border border-slate-200 group hover:border-amber-500 transition-all">
                            <div>
                                <p class="text-2xl font-black text-slate-900 tracking-tighter">8829 001 293</p>
                                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">Gusto
                                    Restaurant Group</p>
                            </div>
                            <button
                                class="bg-slate-100 group-hover:bg-amber-500 group-hover:text-white p-3 rounded-xl transition-all">
                                📋
                            </button>
                        </div>
                    </div>
                </div>

                <div class="space-y-4">
                    <a href="{{ route('dashboard') }}"
                        class="block w-full bg-slate-900 hover:bg-black text-white py-5 rounded-2xl font-black shadow-xl transition-all uppercase tracking-widest">
                        Cek Status di Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
