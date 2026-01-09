@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-slate-50 py-16 px-4">
        <div class="max-w-3xl mx-auto">

            <div class="flex items-center justify-between mb-8">
                <a href="{{ route('dashboard') }}"
                    class="text-slate-400 hover:text-slate-900 font-bold text-xs flex items-center transition-all tracking-widest">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    KEMBALI KE DASHBOARD
                </a>
                <span
                    class="px-5 py-2 {{ $booking->status == 'pending' ? 'bg-amber-100 text-amber-600' : 'bg-emerald-100 text-emerald-600' }} rounded-full text-[10px] font-black uppercase tracking-[0.2em]">
                    {{ $booking->status }}
                </span>
            </div>

            <div class="bg-white rounded-[3.5rem] shadow-2xl shadow-slate-200/60 overflow-hidden border border-slate-100">
                <div class="bg-slate-900 p-12 text-white relative overflow-hidden">
                    <div class="relative z-10">
                        <span class="text-amber-500 text-[10px] font-black uppercase tracking-[0.4em] mb-3 block">Ringkasan
                            Pesanan</span>
                        <h2 class="text-4xl font-black tracking-tight mb-2">{{ $booking->facility->name }}</h2>
                        <p class="text-slate-400 font-medium tracking-wide italic">
                            #GSTO-{{ $booking->id }}{{ $booking->created_at->format('is') }}</p>
                    </div>

                    <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-slate-800 rounded-full opacity-20"></div>
                </div>

                <div class="p-12 lg:p-16">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-12">
                        <div class="space-y-6">
                            <div>
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Tanggal
                                    Reservasi</p>
                                <p class="font-bold text-slate-900 text-lg">
                                    {{ \Carbon\Carbon::parse($booking->reservation_date)->translatedFormat('d F Y') }}</p>
                            </div>
                            <div>
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Waktu
                                    Kedatangan</p>
                                <p class="font-bold text-slate-900 text-lg">{{ $booking->start_time }} <span
                                        class="text-slate-300 font-normal">sampai</span> {{ $booking->end_time }}</p>
                            </div>
                        </div>
                        <div class="md:text-right space-y-6">
                            <div>
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Jumlah Tamu
                                </p>
                                <p class="font-bold text-slate-900 text-lg">{{ $booking->guest_count }} Orang</p>
                            </div>
                            <div>
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Total Biaya
                                </p>
                                <p class="font-black text-3xl text-amber-500 tracking-tight">Rp
                                    {{ number_format($booking->total_price, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>

                    @if ($booking->status == 'pending')
                        <div
                            class="bg-amber-50 rounded-[2.5rem] p-8 border border-amber-100 flex flex-col md:flex-row items-center gap-6">
                            <div
                                class="bg-amber-500 text-white w-14 h-14 rounded-2xl flex items-center justify-center shrink-0 shadow-lg shadow-amber-200">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="flex-grow text-center md:text-left">
                                <h4 class="font-black text-amber-900 text-sm uppercase tracking-widest mb-1">Pembayaran
                                    Menunggu Konfirmasi</h4>
                                <p class="text-amber-700/80 text-xs font-medium leading-relaxed">Harap lampirkan bukti
                                    transfer agar Admin dapat memvalidasi meja Anda segera.</p>
                            </div>
                            <button
                                class="bg-slate-900 hover:bg-black text-white px-8 py-4 rounded-2xl font-black text-[10px] uppercase tracking-widest transition-all transform hover:scale-105 shadow-xl">
                                Upload Bukti
                            </button>
                        </div>
                    @else
                        <div class="bg-emerald-50 rounded-[2.5rem] p-8 border border-emerald-100 text-center">
                            <p class="text-emerald-700 font-bold text-sm tracking-wide">✨ Reservasi Anda telah
                                Terkonfirmasi. Silahkan tunjukkan halaman ini saat kedatangan.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
