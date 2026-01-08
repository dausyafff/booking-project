<div class="max-w-2xl mx-auto py-20 px-6">
    <div class="bg-white rounded-[3rem] shadow-xl p-10 border border-slate-100 text-center">
        <div
            class="w-20 h-20 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
        </div>

        <h2 class="text-3xl font-black text-slate-900 mb-2">Hampir Selesai!</h2>
        <p class="text-slate-500 mb-8">Silahkan selesaikan pembayaran untuk mengonfirmasi meja Anda.</p>

        <div class="bg-slate-50 rounded-2xl p-6 mb-8 text-left">
            <div class="flex justify-between mb-2">
                <span class="text-slate-400">Meja:</span>
                <span class="font-bold text-slate-900">{{ $booking->facility->name }}</span>
            </div>
            <div class="flex justify-between mb-4 pb-4 border-b">
                <span class="text-slate-400">Total Biaya:</span>
                <span class="font-bold text-amber-600 text-xl">Rp
                    {{ number_format($booking->total_price, 0, ',', '.') }}</span>
            </div>

            <p class="text-[10px] font-bold text-slate-400 uppercase mb-2">Transfer Ke Rekening:</p>
            <div class="bg-white p-4 rounded-xl border border-slate-200">
                <p class="font-black text-lg text-slate-900">BCA 123-456-7890</p>
                <p class="text-xs text-slate-500">a/n Gusto Restaurant Premium</p>
            </div>
        </div>

        <a href="{{ route('dashboard') }}"
            class="block w-full bg-slate-900 text-white py-4 rounded-2xl font-bold hover:bg-black transition-all">
            Cek Status di Dashboard
        </a>
    </div>
</div>
