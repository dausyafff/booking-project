<x-app-layout>
    <div class="py-12 bg-[#FDFDFC]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h2 class="text-3xl font-bold text-slate-900">Halo, {{ Auth::user()->name }}! 👋</h2>
                    <p class="text-slate-500">Siap untuk pengalaman kuliner terbaik hari ini?</p>
                </div>
                <a href="{{ url('/') }}"
                    class="bg-amber-500 hover:bg-amber-600 text-white px-6 py-3 rounded-2xl font-bold shadow-lg shadow-amber-200 transition-all">
                    + Buat Reservasi Baru
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
                    <p class="text-slate-500 text-sm font-medium">Reservasi Aktif</p>
                    <h3 class="text-2xl font-bold text-slate-900 mt-1">{{ $activeReservations->count() }} Meja</h3>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                @forelse($activeReservations as $booking)
                    <div
                        class="bg-white p-5 rounded-[2rem] border border-slate-100 shadow-sm flex justify-between items-center">
                        <div>
                            <span
                                class="px-3 py-1 {{ $booking->status == 'pending' ? 'bg-amber-100 text-amber-600' : 'bg-emerald-100 text-emerald-600' }} rounded-full text-[10px] font-bold uppercase mb-2 inline-block">
                                {{ $booking->status }}
                            </span>
                            <h4 class="font-bold text-slate-900 text-lg">{{ $booking->facility->name }}</h4>
                            <p class="text-slate-400 text-xs">
                                {{ \Carbon\Carbon::parse($booking->reservation_date)->format('d M Y') }} •
                                {{ $booking->start_time }}</p>
                        </div>
                        <a href="{{ route('booking.show', $booking->id) }}"
                            class="text-slate-400 hover:text-slate-900 font-bold text-sm">Detail →</a>
                    @empty
                        <div
                            class="col-span-full py-10 text-center bg-slate-50 rounded-3xl border-2 border-dashed border-slate-200">
                            <p class="text-slate-500 font-medium">Belum ada reservasi aktif.</p>
                            <a href="/" class="text-amber-500 font-bold text-sm underline">Cari Meja Sekarang</a>
                        </div>
                @endforelse
                {{-- <div class="lg:col-span-2 space-y-6">
                    <h3 class="text-xl font-bold text-slate-900">Slot Meja Tersedia</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div
                            class="group bg-white p-5 rounded-3xl border border-slate-100 hover:border-amber-200 hover:shadow-md transition-all cursor-pointer">
                            <div class="flex justify-between items-start mb-4">
                                <span
                                    class="px-3 py-1 bg-emerald-50 text-emerald-600 text-xs font-bold rounded-full uppercase">Tersedia</span>
                                <span class="text-slate-400 text-sm italic">#T-01</span>
                            </div>
                            <h4 class="font-bold text-lg text-slate-900">Meja Tepi Jendela (VIP)</h4>

                            <div class="flex gap-2 mt-3">
                                <span
                                    class="text-[10px] bg-slate-100 px-2 py-1 rounded text-slate-500 uppercase font-bold">AC</span>
                                <span
                                    class="text-[10px] bg-slate-100 px-2 py-1 rounded text-slate-500 uppercase font-bold">City
                                    View</span>
                            </div>

                            <div class="mt-5 pt-4 border-t border-slate-50 flex justify-between items-center">
                                <p class="text-amber-600 font-bold">4 Kursi</p>
                                <button class="text-sm font-bold text-slate-900 group-hover:text-amber-600">Pilih Slot
                                    →</button>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <div class="space-y-6">
                    <h3 class="text-xl font-bold text-slate-900">Riwayat Pesanan</h3>
                    <div class="bg-white rounded-3xl border border-slate-100 overflow-hidden">
                        <div class="p-4 bg-slate-50 border-b border-slate-100">
                            <p class="text-xs font-bold text-slate-400 uppercase">Terakhir Dipesan</p>
                        </div>
                        <div class="divide-y divide-slate-50">
                            <div class="p-4 hover:bg-slate-50 transition-colors">
                                <p class="font-bold text-sm text-slate-900">Dinner - 20 Okt 2025</p>
                                <p class="text-xs text-slate-500">Meja VIP #T-05</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
