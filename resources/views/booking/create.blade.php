<div class="max-w-4xl mx-auto py-20 px-6">
    <div class="bg-white rounded-[3rem] shadow-2xl overflow-hidden border border-slate-100 flex flex-col md:flex-row">
        <div class="md:w-1/3 bg-slate-900 p-10 text-white">
            <span class="text-amber-500 font-bold text-xs uppercase tracking-[0.2em]">Konfirmasi</span>
            <h2 class="text-3xl font-black mt-2 mb-6">{{ $facility->name }}</h2>
            <div class="space-y-4 text-sm text-slate-400">
                <p>📍 Area: {{ $facility->location }}</p>
                <p>👥 Maks: {{ $facility->capacity }} Orang</p>
                <p>📅 Tanggal: {{ $selectedDate }}</p>
            </div>
        </div>

        <div class="md:w-2/3 p-12">
            <form action="{{ route('booking.store') }}" method="POST">
                @csrf
                <input type="hidden" name="facility_id" value="{{ $facility->id }}">
                <input type="hidden" name="reservation_date" value="{{ $selectedDate }}">
                <input type="hidden" name="total_price" value="{{ $facility->price_per_hour }}">

                <div class="grid grid-cols-2 gap-6 mb-8">
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase mb-2">Pilih Jam</label>
                        <input type="time" name="start_time"
                            class="w-full bg-slate-50 border-none rounded-xl p-3 focus:ring-2 focus:ring-amber-500 font-bold"
                            required>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase mb-2">Jumlah Tamu</label>
                        <select name="guest_count"
                            class="w-full bg-slate-50 border-none rounded-xl p-3 focus:ring-2 focus:ring-amber-500 font-bold">
                            @for ($i = 1; $i <= $facility->capacity; $i++)
                                <option value="{{ $i }}">{{ $i }} Orang</option>
                            @endfor
                        </select>
                    </div>
                </div>

                <button type="submit"
                    class="w-full bg-amber-500 hover:bg-amber-600 text-white py-4 rounded-2xl font-black shadow-lg shadow-amber-200 transition-all uppercase tracking-widest">
                    Lanjut Ke Pembayaran
                </button>
            </form>
        </div>
    </div>
</div>
