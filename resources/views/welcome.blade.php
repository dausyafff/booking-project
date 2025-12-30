<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gusto - Reservasi Meja Restoran Eksklusif</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .hero-gradient {
            background: radial-gradient(circle at top right, rgba(245, 158, 11, 0.05), transparent),
                radial-gradient(circle at bottom left, rgba(59, 130, 246, 0.03), transparent);
        }
    </style>
</head>

<body class="bg-[#FDFDFC] text-slate-900 antialiased hero-gradient">

    <nav class="fixed top-0 w-full z-50 px-6 py-4">
        <div
            class="max-w-7xl mx-auto flex justify-between items-center bg-white/80 backdrop-blur-xl border border-slate-100 px-6 py-3 rounded-2xl shadow-sm">
            <div class="flex items-center gap-2">
                <div
                    class="w-10 h-10 bg-amber-500 rounded-xl flex items-center justify-center text-white shadow-lg shadow-amber-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <span class="font-extrabold text-xl tracking-tight text-slate-900">GUSTO<span
                        class="text-amber-500">.</span></span>
            </div>

            <div class="hidden md:flex items-center gap-8 text-sm font-bold uppercase tracking-widest text-slate-500">
                <a href="#" class="hover:text-amber-600 transition-colors">Menu</a>
                <a href="#" class="hover:text-amber-600 transition-colors">Lokasi</a>
                <a href="#" class="hover:text-amber-600 transition-colors">Tentang Kami</a>
            </div>

            <div class="flex items-center gap-3">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="bg-slate-900 text-white px-6 py-2.5 rounded-xl text-sm font-bold hover:bg-black transition-all shadow-lg">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="text-sm font-bold text-slate-700 hover:text-amber-600 px-4">Login</a>
                    <a href="{{ route('register') }}"
                        class="bg-amber-500 text-white px-6 py-2.5 rounded-xl text-sm font-bold hover:bg-amber-600 shadow-lg shadow-amber-200 transition-all">Registrasi</a>
                @endauth
            </div>
        </div>
    </nav>

    <section class="pt-40 pb-20 px-6">
        <div class="max-w-4xl mx-auto text-center mb-16">
            <span
                class="inline-block px-4 py-1.5 bg-amber-50 text-amber-700 rounded-full text-xs font-bold tracking-widest uppercase mb-6 border border-amber-100">Premium
                Dining Experience</span>
            <h1 class="text-5xl md:text-7xl font-extrabold text-slate-900 mb-6 tracking-tight leading-tight">
                Ciptakan Moment <br> <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-amber-600 to-amber-400">Tak
                    Terlupakan.</span>
            </h1>
            <p class="text-lg text-slate-500 max-w-2xl mx-auto leading-relaxed">
                Pesan meja favorit Anda di area terbaik. Mulai dari pemandangan taman hingga area privat yang eksklusif
                dengan fasilitas lengkap.
            </p>
        </div>

        <div class="max-w-5xl mx-auto">
            <div
                class="bg-white p-3 rounded-[2.5rem] shadow-2xl border border-slate-100 flex flex-col md:flex-row items-center gap-2">
                <div class="flex-1 w-full px-6 py-3">
                    <label class="block text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-1">Area
                        Restoran</label>
                    <select
                        class="w-full text-slate-800 font-bold focus:outline-none bg-transparent appearance-none cursor-pointer"
                        name="location">
                        <option value="">Semua Area</option>
                        <option value="Indoor">Indoor (AC)</option>
                        <option value="Outdoor">Outdoor (Garden)</option>
                        <option value="Rooftop">Rooftop</option>
                    </select>
                </div>
                <div class="hidden md:block w-[1px] h-12 bg-slate-100"></div>
                <div class="flex-1 w-full px-6 py-3">
                    <label class="block text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-1">Waktu
                        (Slot)</label>
                    <input type="time"
                        class="w-full text-slate-800 font-bold focus:outline-none bg-transparent cursor-pointer">
                </div>
                <div class="hidden md:block w-[1px] h-12 bg-slate-100"></div>
                <div class="flex-1 w-full px-6 py-3">
                    <label class="block text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-1">Jumlah
                        Orang</label>
                    <select
                        class="w-full text-slate-800 font-bold focus:outline-none bg-transparent appearance-none cursor-pointer"
                        name="guests">
                        <option value="2">2 Orang</option>
                        <option value="4">4 Orang</option>
                        <option value="">6+ Orang (Grup)</option>
                    </select>
                </div>
                <button id="btnSearch"
                    class="w-full md:w-auto bg-slate-900 hover:bg-black text-white px-10 py-5 rounded-[2rem] font-bold transition-all shadow-xl active:scale-95">
                    Cek Ketersediaan Meja
                </button>
                <div id="resultContainer" class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
                </div>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-6 pb-32">
        <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-4">
            <div>
                <h2 class="text-3xl font-extrabold text-slate-900">Pilihan Meja Populer</h2>
                <p class="text-slate-500 mt-2">Pilih lokasi meja yang sesuai dengan suasana hati Anda.</p>
            </div>
            <div class="flex gap-2">
                <button
                    class="p-3 rounded-xl border border-slate-200 hover:bg-slate-50 transition-all text-slate-400">←</button>
                <button
                    class="p-3 rounded-xl border border-slate-200 hover:bg-slate-50 transition-all text-slate-400">→</button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div
                class="group bg-white rounded-[2.5rem] p-4 border border-slate-100 hover:shadow-2xl transition-all duration-500">
                <div class="relative overflow-hidden rounded-[2rem] aspect-[4/3] mb-6">
                    <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=800"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div
                        class="absolute top-4 left-4 bg-white/90 backdrop-blur-md px-4 py-1.5 rounded-full text-[10px] font-bold text-amber-600 uppercase tracking-widest">
                        Tersedia Sekarang
                    </div>
                </div>

                <div class="px-2 pb-2">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="font-extrabold text-xl text-slate-900">Veranda Garden #A1</h3>
                        <span class="text-amber-500 font-bold">4 Kursi</span>
                    </div>

                    <div class="flex flex-wrap gap-2 mb-6">
                        <span
                            class="px-2.5 py-1 bg-slate-50 text-slate-500 text-[10px] font-bold rounded-lg border border-slate-100">OUTDOOR</span>
                        <span
                            class="px-2.5 py-1 bg-slate-50 text-slate-500 text-[10px] font-bold rounded-lg border border-slate-100">WIFI</span>
                        <span
                            class="px-2.5 py-1 bg-slate-50 text-slate-500 text-[10px] font-bold rounded-lg border border-slate-100">GARDEN
                            VIEW</span>
                    </div>

                    <div class="flex items-center justify-between pt-4 border-t border-slate-50">
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-tighter">Biaya Reservasi
                            </p>
                            <p class="text-xl font-extrabold text-slate-900">Rp 50.000</p>
                        </div>
                        <a href="{{ route('register') }}"
                            class="bg-slate-100 hover:bg-amber-500 hover:text-white text-slate-900 px-6 py-3 rounded-2xl font-bold transition-all text-sm">Pesan
                            Meja</a>
                    </div>
                </div>
            </div>

            <div
                class="group bg-white rounded-[2.5rem] p-4 border border-slate-100 hover:shadow-2xl transition-all duration-500">
                <div class="relative overflow-hidden rounded-[2rem] aspect-[4/3] mb-6">
                    <img src="https://images.unsplash.com/photo-1559339352-11d035aa65de?auto=format&fit=crop&w=800"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div
                        class="absolute top-4 left-4 bg-white/90 backdrop-blur-md px-4 py-1.5 rounded-full text-[10px] font-bold text-amber-600 uppercase tracking-widest">
                        VIP ONLY
                    </div>
                </div>

                <div class="px-2 pb-2">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="font-extrabold text-xl text-slate-900">Private Suite #V2</h3>
                        <span class="text-amber-500 font-bold">8 Kursi</span>
                    </div>

                    <div class="flex flex-wrap gap-2 mb-6">
                        <span
                            class="px-2.5 py-1 bg-slate-50 text-slate-500 text-[10px] font-bold rounded-lg border border-slate-100">AC</span>
                        <span
                            class="px-2.5 py-1 bg-slate-50 text-slate-500 text-[10px] font-bold rounded-lg border border-slate-100">SMOKING
                            AREA</span>
                        <span
                            class="px-2.5 py-1 bg-slate-50 text-slate-500 text-[10px] font-bold rounded-lg border border-slate-100">KARAOKE</span>
                    </div>

                    <div class="flex items-center justify-between pt-4 border-t border-slate-50">
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-tighter">Biaya Reservasi
                            </p>
                            <p class="text-xl font-extrabold text-slate-900">Rp 250.000</p>
                        </div>
                        <a href="{{ route('register') }}"
                            class="bg-slate-100 hover:bg-amber-500 hover:text-white text-slate-900 px-6 py-3 rounded-2xl font-bold transition-all text-sm">Pesan
                            Meja</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-slate-900 text-white py-20 px-6">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-12">
            <div class="md:col-span-2">
                <span class="font-extrabold text-2xl tracking-tight">GUSTO<span class="text-amber-500">.</span></span>
                <p class="mt-4 text-slate-400 max-w-sm leading-relaxed">
                    Menghadirkan kemudahan dalam merencanakan makan malam romantis atau pertemuan bisnis Anda. Reservasi
                    meja belum pernah semudah ini.
                </p>
            </div>
            <div>
                <h4 class="font-bold mb-6 uppercase text-xs tracking-[0.2em] text-amber-500">Navigasi</h4>
                <ul class="space-y-4 text-slate-400 text-sm">
                    <li><a href="#" class="hover:text-white transition-colors">Cek Slot Meja</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Daftar Menu</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Tentang Kami</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-6 uppercase text-xs tracking-[0.2em] text-amber-500">Hubungi Kami</h4>
                <p class="text-slate-400 text-sm leading-relaxed">
                    Jl. Kuliner No. 123, Jakarta Selatan<br>
                    support@gusto.com<br>
                    +62 812 3456 7890
                </p>
            </div>
        </div>
    </footer>

    <script>
        document.getElementById('btnSearch').addEventListener('click', function() {
            // Memberikan feedback loading
            this.innerText = 'Mencari...';
            this.disabled = true;

            const location = document.querySelector('select[name="location"]').value;
            const time = document.querySelector('input[type="time"]').value;
            const guests = document.querySelector('select[name="guests"]').value;

            fetch(`/api/check-availability?location=${location}&start_time=${time}&guest_count=${guests}`)
                .then(response => {
                    if (!response.ok) throw new Error('Network response was not ok');
                    return response.json();
                })
                .then(res => {
                    const container = document.getElementById('resultContainer');
                    container.innerHTML = '';

                    if (!res.data || res.data.length === 0) {
                        container.innerHTML =
                            '<div class="col-span-full text-center py-10"><p class="text-slate-500 font-medium">Maaf, tidak ada meja yang tersedia untuk kriteria tersebut.</p></div>';
                    } else {
                        res.data.forEach(item => {
                            container.innerHTML += `
                        <div class="bg-white p-6 rounded-[2.5rem] border border-slate-100 shadow-xl hover:shadow-2xl transition-all">
                            <div class="w-12 h-12 bg-amber-100 text-amber-600 rounded-2xl flex items-center justify-center mb-4 font-bold">
                                ${item.capacity}
                            </div>
                            <h3 class="font-extrabold text-xl text-slate-900">${item.name}</h3>
                            <p class="text-slate-500 text-sm mt-1">${item.location}</p>
                            <button onclick="bookingNow(${item.id})" class="mt-6 w-full bg-slate-900 hover:bg-amber-600 text-white py-3 rounded-2xl font-bold transition-all">
                                Pesan Sekarang
                            </button>
                        </div>
                    `;
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat mengambil data.');
                })
                .finally(() => {
                    this.innerText = 'Cek Ketersediaan Meja';
                    this.disabled = false;
                });
        });
    </script>
</body>

</html>
