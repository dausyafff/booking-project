<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BookingApp - Solusi Reservasi Cepat</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .search-shadow {
            box-shadow: 0 20px 50px -12px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-[#F8FAFC] text-slate-900 antialiased">

    <nav class="fixed top-0 w-full z-50 px-6 py-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center bg-white/70 backdrop-blur-md border border-white/20 px-6 py-3 rounded-2xl shadow-sm">
            <div class="flex items-center gap-2">
                <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-blue-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <span class="font-bold text-xl tracking-tight text-blue-900">BookNow</span>
            </div>

            <div class="hidden md:flex items-center gap-8 text-sm font-medium text-slate-600">
                <a href="#" class="hover:text-blue-600 transition-colors">Destinasi</a>
                <a href="#" class="hover:text-blue-600 transition-colors">Promo</a>
                <a href="#" class="hover:text-blue-600 transition-colors">Pesanan Saya</a>
            </div>

            <div class="flex items-center gap-3">
                @auth
                    <a href="{{ url('/dashboard') }}" class="bg-slate-900 text-white px-5 py-2.5 rounded-xl text-sm font-semibold hover:bg-slate-800 transition-all">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-700 hover:text-blue-600 px-4">Masuk</a>
                    <a href="{{ route('register') }}" class="bg-blue-600 text-white px-5 py-2.5 rounded-xl text-sm font-semibold hover:bg-blue-700 shadow-md shadow-blue-100 transition-all">Daftar</a>
                @endauth
            </div>
        </div>
    </nav>

    <section class="pt-32 pb-20 px-6">
        <div class="max-w-4xl mx-auto text-center mb-12">
            <h1 class="text-4xl md:text-6xl font-extrabold text-slate-900 mb-6 tracking-tight">
                Temukan Tempat Terbaik <br> <span class="text-blue-600">Untuk Moment Spesialmu.</span>
            </h1>
            <p class="text-lg text-slate-500 max-w-2xl mx-auto">
                Ribuan pilihan lokasi, hotel, dan jasa siap Anda pesan dalam hitungan detik. Tanpa ribet, tanpa biaya tambahan.
            </p>
        </div>

        <div class="max-w-5xl mx-auto">
            <div class="bg-white p-4 md:p-2 rounded-3xl shadow-2xl search-shadow flex flex-col md:flex-row items-center gap-2 border border-slate-100">
                <div class="flex-1 w-full px-4 py-3">
                    <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-1">Lokasi</label>
                    <input type="text" placeholder="Mau kemana hari ini?" class="w-full text-slate-800 font-medium focus:outline-none placeholder:text-slate-300">
                </div>
                <div class="hidden md:block w-[1px] h-10 bg-slate-100"></div>
                <div class="flex-1 w-full px-4 py-3">
                    <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-1">Tanggal</label>
                    <input type="date" class="w-full text-slate-800 font-medium focus:outline-none">
                </div>
                <div class="hidden md:block w-[1px] h-10 bg-slate-100"></div>
                <div class="flex-1 w-full px-4 py-3">
                    <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-1">Tamu</label>
                    <select class="w-full text-slate-800 font-medium focus:outline-none bg-transparent">
                        <option>1 Orang</option>
                        <option>2 Orang</option>
                        <option>Keluarga</option>
                    </select>
                </div>
                <button class="w-full md:w-auto bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-2xl font-bold transition-all flex items-center justify-center gap-2 shadow-lg shadow-blue-200 active:scale-95">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                    Cari Sekarang
                </button>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-6 pb-24">
        <div class="flex justify-between items-end mb-8">
            <div>
                <h2 class="text-2xl font-bold text-slate-900">Rekomendasi Terpopuler</h2>
                <p class="text-slate-500">Pilihan favorit para pengguna bulan ini</p>
            </div>
            <a href="#" class="text-blue-600 font-semibold text-sm hover:underline">Lihat Semua →</a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="group cursor-pointer">
                <div class="relative overflow-hidden rounded-3xl mb-4 aspect-[4/5]">
                    <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=600" alt="Hotel" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-md px-3 py-1 rounded-full text-[12px] font-bold text-blue-600 shadow-sm">
                        ⭐ 4.9
                    </div>
                </div>
                <h3 class="font-bold text-lg text-slate-900 group-hover:text-blue-600 transition-colors">The Grand Resort & Spa</h3>
                <p class="text-slate-500 text-sm mb-2 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    </svg> Bali, Indonesia
                </p>
                <div class="flex items-center justify-between">
                    <p class="text-blue-600 font-bold text-lg">Rp 1.250.000 <span class="text-slate-400 text-xs font-normal">/ malam</span></p>
                </div>
            </div>

            <div class="group cursor-pointer">
                <div class="relative overflow-hidden rounded-3xl mb-4 aspect-[4/5]">
                    <img src="https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?auto=format&fit=crop&w=600" alt="Villa" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-md px-3 py-1 rounded-full text-[12px] font-bold text-blue-600 shadow-sm">
                        ⭐ 4.8
                    </div>
                </div>
                <h3 class="font-bold text-lg text-slate-900 group-hover:text-blue-600 transition-colors">Pine Forest Villa</h3>
                <p class="text-slate-500 text-sm mb-2 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    </svg> Bandung, Indonesia
                </p>
                <div class="flex items-center justify-between">
                    <p class="text-blue-600 font-bold text-lg">Rp 850.000 <span class="text-slate-400 text-xs font-normal">/ malam</span></p>
                </div>
            </div>
        </div>
    </section>

</body>

</html>