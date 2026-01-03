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

        <div class="max-w-5xl mx-auto mb-20">
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
                    <label class="block text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-1">Tanggal
                        Reservasi</label>
                    <input type="date" id="reservationDate"
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
                        <option value="6">6+ Orang</option>
                    </select>
                </div>
                <div>
                    <button id="btnSearch"
                        class="w-full md:w-auto bg-slate-900 hover:bg-black text-white px-10 py-5 rounded-[2rem] font-bold transition-all shadow-xl active:scale-95">
                        Cek Ketersediaan Meja
                    </button>
                </div>
            </div>
        </div>

        <div id="resultWrapper" class="max-w-7xl mx-auto hidden mt-10">
            <div class="flex justify-between items-center mb-10">
                <h2 class="text-3xl font-extrabold text-slate-900">Meja Tersedia</h2>
                <div id="matchCount" class="bg-amber-100 text-amber-700 px-6 py-2 rounded-full text-sm font-bold">0 Meja
                </div>
            </div>
            <div id="resultContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            </div>
        </div>
    </section>

    <footer class="bg-slate-900 text-white py-20 px-6">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-12">
            <div class="md:col-span-2">
                <span class="font-extrabold text-2xl tracking-tight">GUSTO<span class="text-amber-500">.</span></span>
                <p class="mt-4 text-slate-400 max-w-sm leading-relaxed">Menghadirkan kemudahan dalam merencanakan makan
                    malam romantis atau pertemuan bisnis Anda.</p>
            </div>
            <div>
                <h4 class="font-bold mb-6 uppercase text-xs tracking-[0.2em] text-amber-500">Navigasi</h4>
                <ul class="space-y-4 text-slate-400 text-sm">
                    <li><a href="#" class="hover:text-white transition-colors">Cek Slot Meja</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Daftar Menu</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-6 uppercase text-xs tracking-[0.2em] text-amber-500">Hubungi Kami</h4>
                <p class="text-slate-400 text-sm">Jl. Kuliner No. 123, Jakarta Selatan<br>support@gusto.com</p>
            </div>
        </div>
    </footer>

    <script>
        const isLoggedIn = {{ auth()->check() ? 'true' : 'false' }};
        document.addEventListener('DOMContentLoaded', function() {
            const btnSearch = document.getElementById('btnSearch');
            const dateInput = document.getElementById('reservationDate');
            const resultWrapper = document.getElementById('resultWrapper');
            const resultContainer = document.getElementById('resultContainer');
            const matchCount = document.getElementById('matchCount');

            // 1. SETUP BATASAN TANGGAL (H+2)
            const today = new Date();
            const maxDate = new Date();
            maxDate.setDate(today.getDate() + 2);
            const formatDate = (date) => date.toISOString().split('T')[0];

            dateInput.min = formatDate(today);
            dateInput.max = formatDate(maxDate);
            dateInput.value = formatDate(today);

            // 2. LOGIKA PENCARIAN
            btnSearch.addEventListener('click', function() {
                const location = document.querySelector('select[name="location"]').value;
                const date = dateInput.value;
                const guests = document.querySelector('select[name="guests"]').value;

                btnSearch.innerText = 'Memeriksa...';
                btnSearch.disabled = true;

                fetch(`/api/check-availability?location=${location}&date=${date}&guest_count=${guests}`)
                    .then(res => res.json())
                    .then(res => {
                        resultWrapper.classList.remove('hidden');
                        resultContainer.innerHTML = '';
                        matchCount.innerText = `${res.data.length} Meja Ditemukan`;

                        if (res.data.length === 0) {
                            resultContainer.innerHTML = `
                                <div class="col-span-full text-center py-20 bg-slate-50 rounded-[3rem] border-2 border-dashed">
                                    <p class="text-slate-500 font-bold text-xl">Maaf, tidak ada meja tersedia.</p>
                                    <p class="text-slate-400">Coba pilih tanggal atau area yang berbeda.</p>
                                </div>`;
                        } else {
                            res.data.forEach(item => {
                                resultContainer.innerHTML += generateCard(item, date);
                            });
                        }

                        // Auto scroll ke hasil
                        resultWrapper.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    })
                    .catch(err => {
                        console.error(err);
                        alert('Gagal mengambil data ketersediaan.');
                    })
                    .finally(() => {
                        btnSearch.innerText = 'Cek Ketersediaan Meja';
                        btnSearch.disabled = false;
                    });
            });
        });

        function generateCard(item, selectedDate) {
            const price = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                maximumSignificantDigits: 3
            }).format(item.price_per_hour || 50000);
            return `
                    <div class="group bg-white rounded-3xl p-6 border border-slate-100 shadow-sm hover:border-amber-500 transition-all duration-300 relative overflow-hidden">
                <div class="flex justify-between items-start mb-6">
                    <div class="w-14 h-14 bg-slate-900 text-white rounded-2xl flex flex-col items-center justify-center shadow-lg group-hover:bg-amber-500 transition-colors">
                        <span class="text-[10px] uppercase font-bold opacity-60">No</span>
                        <span class="text-xl font-black">${item.name.replace('Meja ', '')}</span>
                    </div>
                    <div class="text-right">
                        <span class="block text-xs font-bold text-slate-400 uppercase tracking-widest">${item.location}</span>
                        <span class="text-emerald-500 text-xs font-bold">● Tersedia</span>
                    </div>
                </div>

                <div class="space-y-4">
                    <div>
                        <h3 class="font-bold text-slate-900 text-lg">${item.name}</h3>
                        <p class="text-slate-500 text-sm">Kapasitas: ${item.capacity} Orang</p>
                    </div>

                    <button onclick="bookingNow(${item.id})" class="w-full py-3 bg-slate-50 group-hover:bg-slate-900 group-hover:text-white text-slate-900 rounded-xl font-bold text-sm transition-all flex items-center justify-center gap-2">
                        Pilih Meja Ini
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                </div>
            </div>`;
        }

        function bookingNow(id) {
            if (!isLoggedIn) {
                // Jika belum login, arahkan ke halsaman login
                alert("Silahkan login terlebih dahulu untuk memilih meja spesifik.");
                window.location.href = "{{ route('login') }}";
                return;
            }

            // Jika sudah login, lanjut ke halaman detail booking
            const selectedDate = document.getElementById('reservationDate').value;
            window.location.href = `/booking/create?facility_id=${id}&date=${selectedDate}`;
        }
    </script>
</body>

</html>
