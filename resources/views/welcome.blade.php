<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DiTrace UPR - Tracer Study Alumni</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.css" />

    <style>
        .hero-pattern {
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
        }

        #map {
            border-radius: 20px;
        }
    </style>
</head>

<body class="bg-white text-gray-800">

    <!-- NAVBAR -->
    <nav class="w-full bg-white shadow-sm fixed top-0 left-0 z-50">
        <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
            <img src="/images/ditrace-hitam.png" alt="DiTrace Logo" class="h-12 w-auto">

            <div class="hidden md:flex gap-6 font-medium">
                <a href="#home" class="hover:text-green-600">Beranda</a>
                <a href="#about" class="hover:text-green-600">Tentang</a>
                <a href="#jobs" class="hover:text-green-600">Lowongan</a>
                <a href="#alumni" class="hover:text-green-600">Alumni</a>
                <a href="#contact" class="hover:text-green-600">Kontak</a>
            </div>

            <a href="/admin"
                class="bg-green-500 text-white px-5 py-2 rounded-full hover:bg-green-600 transition">
                Login
            </a>
        </div>
    </nav>

    <!-- HERO -->
    <section id="home" class="hero-pattern min-h-screen flex items-center mt-20">
        <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-10 items-center">

            <div>
                <h2 class="text-4xl md:text-5xl font-bold mb-4">
                    Tracer Study <span class="text-green-600">Alumni UPR</span>
                </h2>
                <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                    Memetakan jejak alumni UPR untuk meningkatkan kualitas pendidikan dan daya saing lulusan.
                </p>

                <div class="flex gap-4">
                    <a href="#about" class="bg-green-500 text-white px-6 py-3 rounded-full font-semibold hover:bg-green-600">
                        Mulai Tracer Study
                    </a>

                    <a href="#jobs" class="border-2 border-green-500 text-green-600 px-6 py-3 rounded-full font-semibold hover:bg-green-500 hover:text-white">
                        Lowongan Kerja
                    </a>
                </div>
            </div>

            <!-- Kartu statistik -->
            <div class="bg-white shadow-lg rounded-2xl p-6">
                <h3 class="text-xl font-bold text-green-600 mb-4">Statistik Alumni</h3>

                <div class="grid grid-cols-2 gap-4 text-center">
                    <div>
                        <p class="text-3xl font-bold text-green-500">2,847</p>
                        <p class="text-sm text-gray-600">Alumni</p>
                    </div>
                    <div>
                        <p class="text-3xl font-bold text-green-500">85%</p>
                        <p class="text-sm text-gray-600">Bekerja</p>
                    </div>
                    <div>
                        <p class="text-3xl font-bold text-green-500">34</p>
                        <p class="text-sm text-gray-600">Provinsi</p>
                    </div>
                    <div>
                        <p class="text-3xl font-bold text-green-500">156</p>
                        <p class="text-sm text-gray-600">Perusahaan</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ABOUT -->
    <section id="about" class="py-20 bg-gray-50">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Tentang Tracer Study</h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                Program untuk mengetahui keberadaan, pekerjaan, dan kontribusi alumni sebagai bahan evaluasi dan perbaikan pendidikan.
            </p>

            <div class="grid md:grid-cols-3 gap-8 mt-14">
                <div class="bg-white p-8 rounded-2xl shadow-sm border">
                    <h3 class="text-xl font-bold mb-3 text-green-600">Analisis Karir</h3>
                    <p class="text-gray-600">Melacak perkembangan karir alumni untuk melihat efektivitas pendidikan UPR.</p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm border">
                    <h3 class="text-xl font-bold mb-3 text-green-600">Jaringan Alumni</h3>
                    <p class="text-gray-600">Membangun koneksi antar alumni untuk kolaborasi dan peluang kerja.</p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm border">
                    <h3 class="text-xl font-bold mb-3 text-green-600">Data Insights</h3>
                    <p class="text-gray-600">Data alumni membantu peningkatan kurikulum dan mutu lulusan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- JOB LIST -->
    <section id="jobs" class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-4">Lowongan Kerja</h2>
            <p class="text-lg text-gray-600 text-center mb-12">Daftar peluang kerja untuk alumni UPR.</p>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="p-6 border rounded-2xl shadow-sm hover:shadow-lg transition">
                    <h3 class="font-bold text-xl mb-1">Software Engineer</h3>
                    <p class="text-gray-600 mb-2">PT. Teknologi Nusantara</p>
                    <button class="w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-600">
                        Lamar
                    </button>
                </div>

                <div class="p-6 border rounded-2xl shadow-sm hover:shadow-lg transition">
                    <h3 class="font-bold text-xl mb-1">Business Analyst</h3>
                    <p class="text-gray-600 mb-2">Bank Central Asia</p>
                    <button class="w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-600">
                        Lamar
                    </button>
                </div>

                <div class="p-6 border rounded-2xl shadow-sm hover:shadow-lg transition">
                    <h3 class="font-bold text-xl mb-1">Product Manager</h3>
                    <p class="text-gray-600 mb-2">GoTo Group</p>
                    <button class="w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-600">
                        Lamar
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- MAP SECTION -->
    <section id="alumni" class="py-20 bg-gray-50">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-6">Peta Persebaran Alumni</h2>

            <div id="map" class="w-full h-96 shadow-lg"></div>
        </div>
    </section>

    <!-- CONTACT -->
    <section id="contact" class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-10">

            <div>
                <h2 class="text-3xl font-bold mb-4">Hubungi Kami</h2>
                <p class="text-gray-600 mb-8">Silakan hubungi kami jika ada pertanyaan.</p>

                <div class="space-y-5">
                    <div>
                        <p class="font-semibold">Email</p>
                        <p class="text-gray-600">ditrace@upr.ac.id</p>
                    </div>
                    <div>
                        <p class="font-semibold">Telepon</p>
                        <p class="text-gray-600">+62 536 3101755</p>
                    </div>
                    <div>
                        <p class="font-semibold">Alamat</p>
                        <p class="text-gray-600">Universitas Palangka Raya,<br>Jl. Hendrik Timang</p>
                    </div>
                </div>
            </div>

            <form class="bg-gray-50 p-6 rounded-2xl shadow-sm">
                <div class="grid gap-4">
                    <input class="border p-3 rounded-lg" placeholder="Nama Lengkap">
                    <input class="border p-3 rounded-lg" placeholder="Email">
                    <input class="border p-3 rounded-lg" placeholder="Subjek">
                    <textarea class="border p-3 rounded-lg h-28 resize-none" placeholder="Pesan"></textarea>

                    <button class="bg-green-500 text-white py-3 rounded-lg hover:bg-green-600">
                        Kirim Pesan
                    </button>
                </div>
            </form>

        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-gray-900 text-white py-6 text-center">
        <p class="text-gray-400">&copy; {{ date('Y') }} DiTrace UPR — Tracer Study Alumni</p>
    </footer>

    <!-- MAP SCRIPT -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([-2.2, 113.9], 5);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
        }).addTo(map);

        // Contoh marker alumni
        L.marker([-6.2, 106.8]).addTo(map).bindPopup("Jakarta: 486 Alumni");
        L.marker([-3.3, 113.9]).addTo(map).bindPopup("Kalimantan Tengah: 300+ Alumni");
    </script>

</body>

</html>