<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <title>DiTrace UPR - Tracer Study Alumni</title>

    @vite('resources/css/app.css')

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.css" />
    <script src="https://cdn.jsdelivr.net/npm/echarts@5/dist/echarts.min.js"></script>
    <script src="https://echarts-maps.github.io/echarts-countries-js/geojson/country/IDN.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'light-green': {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            300: '#86efac',
                            400: '#4ade80',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                            800: '#166534',
                            900: '#14532d'
                        }
                    }
                }
            }
        }
    </script>
    <style>
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes pulse-dot {
            0% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.2);
                opacity: 0.8;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .float-animation {
            animation: float 6s ease-in-out infinite;
        }

        .pulse-dot {
            animation: pulse-dot 2s infinite;
        }

        .leaflet-container {
            border-radius: 15px;
        }
    </style>
</head>

<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex  items-center lg:justify-center min-h-screen flex-col">
    <!-- Navigation -->
    <nav class="fixed top-0 w-full bg-white/95 backdrop-blur-md z-50 border-b border-light-green-100 transition-all duration-300" id="navbar">
        <div class="max-w-6xl mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-3">
                    <div class="bg-light-green-400 text-white p-2 rounded-xl">
                        <i class="fas fa-graduation-cap text-xl"></i>
                    </div>
                    <span class="text-2xl font-bold text-light-green-600">DiTrace UPR</span>
                </div>
                <ul class="hidden md:flex items-center gap-8">
                    <li><a href="#home" class="text-slate-700 hover:text-light-green-500 font-medium transition-colors relative group">
                            Beranda
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-light-green-400 transition-all group-hover:w-full"></span>
                        </a></li>
                    <li><a href="#about" class="text-slate-700 hover:text-light-green-500 font-medium transition-colors relative group">
                            Tentang
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-light-green-400 transition-all group-hover:w-full"></span>
                        </a></li>
                    <li><a href="#jobs" class="text-slate-700 hover:text-light-green-500 font-medium transition-colors relative group">
                            Lowongan
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-light-green-400 transition-all group-hover:w-full"></span>
                        </a></li>
                    <li><a href="#alumni" class="text-slate-700 hover:text-light-green-500 font-medium transition-colors relative group">
                            Alumni
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-light-green-400 transition-all group-hover:w-full"></span>
                        </a></li>
                    <li><a href="#contact" class="text-slate-700 hover:text-light-green-500 font-medium transition-colors relative group">
                            Kontak
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-light-green-400 transition-all group-hover:w-full"></span>
                        </a></li>
                </ul>
                <a href="{{url('admin')}}" class="bg-light-green-400 hover:bg-light-green-500 text-white px-6 py-2 rounded-full font-semibold flex items-center gap-2 transition-all hover:-translate-y-0.5 shadow-md hover:shadow-lg">
                    <i class="fas fa-sign-in-alt"></i>
                    Login
                </a>
            </div>
            <div class="md:hidden flex items-center gap-4">
                <a href="{{url('admin')}}" class="bg-light-green-400 hover:bg-light-green-500 text-white px-4 py-2 rounded-full font-medium flex items-center gap-2 transition-all text-sm">
                    <i class="fas fa-sign-in-alt"></i>
                    Login
                </a>
                <button class="text-slate-700">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="min-h-screen w-full bg-gradient-to-br from-light-green-50 to-light-green-100 flex items-center relative overflow-hidden" id="home">
        <!-- Decorative Elements -->
        <div class="absolute top-20 right-10 w-32 h-32 bg-light-green-200/30 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 left-10 w-40 h-40 bg-light-green-300/20 rounded-full blur-3xl"></div>

        <div class="max-w-6xl mx-auto px-6 py-20 mt-20">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-8">
                    <h1 class="text-5xl lg:text-6xl font-bold text-slate-800 leading-tight">
                        Tracer Study
                        <span class="text-light-green-500">Alumni UPR</span>
                    </h1>
                    <p class="text-xl text-slate-600 leading-relaxed">
                        Membangun jembatan antara dunia pendidikan dan profesional melalui penelusuran jejak alumni yang komprehensif dan berkelanjutan.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#about" class="bg-light-green-400 hover:bg-light-green-500 text-white px-8 py-4 rounded-full font-semibold flex items-center gap-3 shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-1 justify-center">
                            <i class="fas fa-search"></i>
                            Mulai Tracer Study
                        </a>
                        <a href="#jobs" class="border-2 border-light-green-400 text-light-green-600 hover:bg-light-green-400 hover:text-white px-8 py-4 rounded-full font-semibold flex items-center gap-3 transition-all transform hover:-translate-y-1 justify-center">
                            <i class="fas fa-briefcase"></i>
                            Lihat Lowongan
                        </a>
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="bg-white rounded-3xl p-8 shadow-2xl max-w-sm w-full float-animation">
                        <h3 class="text-2xl font-bold text-light-green-600 mb-6">Statistik Alumni</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-slate-50 p-4 rounded-2xl text-center">
                                <div class="text-3xl font-bold text-light-green-500">2,847</div>
                                <div class="text-sm text-slate-600">Alumni Terdaftar</div>
                            </div>
                            <div class="bg-slate-50 p-4 rounded-2xl text-center">
                                <div class="text-3xl font-bold text-light-green-500">85%</div>
                                <div class="text-sm text-slate-600">Tingkat Kerja</div>
                            </div>
                            <div class="bg-slate-50 p-4 rounded-2xl text-center">
                                <div class="text-3xl font-bold text-light-green-500">156</div>
                                <div class="text-sm text-slate-600">Perusahaan</div>
                            </div>
                            <div class="bg-slate-50 p-4 rounded-2xl text-center">
                                <div class="text-3xl font-bold text-light-green-500">34</div>
                                <div class="text-sm text-slate-600">Provinsi</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-20 w-full bg-white" id="about">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-slate-800 mb-4">Tentang Tracer Study</h2>
                <p class="text-xl text-slate-600 max-w-3xl mx-auto">
                    Penelusuran jejak alumni yang sistematis untuk mengevaluasi kualitas pendidikan dan memberikan wawasan berharga bagi pengembangan kurikulum serta peningkatan daya saing lulusan.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white border border-slate-200 p-8 rounded-3xl shadow-lg hover:shadow-xl transition-all hover:-translate-y-2 border-t-4 border-t-light-green-400">
                    <div class="bg-light-green-100 w-16 h-16 rounded-2xl flex items-center justify-center mb-6">
                        <i class="fas fa-chart-line text-2xl text-light-green-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-4">Analisis Karir</h3>
                    <p class="text-slate-600 leading-relaxed">
                        Memantau perkembangan karir alumni untuk mengukur efektivitas program pendidikan dan memberikan feedback konstruktif.
                    </p>
                </div>

                <div class="bg-white border border-slate-200 p-8 rounded-3xl shadow-lg hover:shadow-xl transition-all hover:-translate-y-2 border-t-4 border-t-light-green-400">
                    <div class="bg-light-green-100 w-16 h-16 rounded-2xl flex items-center justify-center mb-6">
                        <i class="fas fa-network-wired text-2xl text-light-green-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-4">Jaringan Alumni</h3>
                    <p class="text-slate-600 leading-relaxed">
                        Membangun koneksi yang kuat antar alumni untuk sharing pengalaman dan menciptakan peluang kolaborasi profesional.
                    </p>
                </div>

                <div class="bg-white border border-slate-200 p-8 rounded-3xl shadow-lg hover:shadow-xl transition-all hover:-translate-y-2 border-t-4 border-t-light-green-400">
                    <div class="bg-light-green-100 w-16 h-16 rounded-2xl flex items-center justify-center mb-6">
                        <i class="fas fa-database text-2xl text-light-green-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-4">Data Insights</h3>
                    <p class="text-slate-600 leading-relaxed">
                        Mengumpulkan dan menganalisis data untuk menghasilkan insights yang dapat digunakan untuk peningkatan kualitas pendidikan.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Job Opportunities Section -->
    <section class="py-20 w-full bg-slate-50" id="jobs">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-slate-800 mb-4">Lowongan Kerja Terkini</h2>
                <p class="text-xl text-slate-600 max-w-3xl mx-auto">
                    Peluang karir menarik dari berbagai perusahaan yang bekerjasama dengan UPR untuk memberikan kesempatan terbaik bagi alumni.
                </p>
            </div>

            <div class="grid lg:grid-cols-3 gap-8">
                <!-- Job Card 1 -->
                <div class="bg-white rounded-3xl p-6 shadow-lg hover:shadow-xl transition-all hover:-translate-y-2 relative overflow-hidden">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-light-green-400"></div>
                    <div class="flex justify-between items-start mb-6">
                        <div class="bg-light-green-100 w-12 h-12 rounded-xl flex items-center justify-center font-bold text-light-green-600">
                            PT
                        </div>
                        <div class="flex gap-2">
                            <span class="bg-light-green-100 text-light-green-700 px-3 py-1 rounded-full text-sm font-medium">Full-time</span>
                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-medium">Remote</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-2">Software Engineer</h3>
                    <p class="text-slate-600 mb-4">PT. Teknologi Nusantara</p>
                    <div class="flex items-center gap-2 text-slate-500 mb-4">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Jakarta, Indonesia</span>
                    </div>
                    <div class="text-lg font-bold text-light-green-600 mb-4">Rp 8.000.000 - Rp 15.000.000</div>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="bg-slate-100 border border-light-green-200 text-slate-600 px-2 py-1 rounded text-sm">JavaScript</span>
                        <span class="bg-slate-100 border border-light-green-200 text-slate-600 px-2 py-1 rounded text-sm">React</span>
                        <span class="bg-slate-100 border border-light-green-200 text-slate-600 px-2 py-1 rounded text-sm">Node.js</span>
                        <span class="bg-slate-100 border border-light-green-200 text-slate-600 px-2 py-1 rounded text-sm">PostgreSQL</span>
                    </div>
                    <button class="w-full bg-light-green-400 hover:bg-light-green-500 text-white py-3 rounded-xl font-semibold flex items-center justify-center gap-2 transition-colors">
                        <i class="fas fa-paper-plane"></i>
                        Lamar Sekarang
                    </button>
                </div>

                <!-- Job Card 2 -->
                <div class="bg-white rounded-3xl p-6 shadow-lg hover:shadow-xl transition-all hover:-translate-y-2 relative overflow-hidden">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-light-green-400"></div>
                    <div class="flex justify-between items-start mb-6">
                        <div class="bg-blue-100 w-12 h-12 rounded-xl flex items-center justify-center font-bold text-blue-600">
                            BCA
                        </div>
                        <div class="flex gap-2">
                            <span class="bg-light-green-100 text-light-green-700 px-3 py-1 rounded-full text-sm font-medium">Full-time</span>
                            <span class="bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-sm font-medium">On-site</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-2">Business Analyst</h3>
                    <p class="text-slate-600 mb-4">Bank Central Asia</p>
                    <div class="flex items-center gap-2 text-slate-500 mb-4">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Surabaya, Jawa Timur</span>
                    </div>
                    <div class="text-lg font-bold text-light-green-600 mb-4">Rp 6.500.000 - Rp 10.000.000</div>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="bg-slate-100 border border-light-green-200 text-slate-600 px-2 py-1 rounded text-sm">SQL</span>
                        <span class="bg-slate-100 border border-light-green-200 text-slate-600 px-2 py-1 rounded text-sm">Excel</span>
                        <span class="bg-slate-100 border border-light-green-200 text-slate-600 px-2 py-1 rounded text-sm">Power BI</span>
                        <span class="bg-slate-100 border border-light-green-200 text-slate-600 px-2 py-1 rounded text-sm">Finance</span>
                    </div>
                    <button class="w-full bg-light-green-400 hover:bg-light-green-500 text-white py-3 rounded-xl font-semibold flex items-center justify-center gap-2 transition-colors">
                        <i class="fas fa-paper-plane"></i>
                        Lamar Sekarang
                    </button>
                </div>

                <!-- Job Card 3 -->
                <div class="bg-white rounded-3xl p-6 shadow-lg hover:shadow-xl transition-all hover:-translate-y-2 relative overflow-hidden">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-light-green-400"></div>
                    <div class="flex justify-between items-start mb-6">
                        <div class="bg-green-100 w-12 h-12 rounded-xl flex items-center justify-center font-bold text-green-600">
                            GO
                        </div>
                        <div class="flex gap-2">
                            <span class="bg-light-green-100 text-light-green-700 px-3 py-1 rounded-full text-sm font-medium">Full-time</span>
                            <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm font-medium">Hybrid</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-2">Product Manager</h3>
                    <p class="text-slate-600 mb-4">GoTo Group</p>
                    <div class="flex items-center gap-2 text-slate-500 mb-4">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Jakarta, Indonesia</span>
                    </div>
                    <div class="text-lg font-bold text-light-green-600 mb-4">Rp 12.000.000 - Rp 20.000.000</div>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="bg-slate-100 border border-light-green-200 text-slate-600 px-2 py-1 rounded text-sm">Strategy</span>
                        <span class="bg-slate-100 border border-light-green-200 text-slate-600 px-2 py-1 rounded text-sm">Analytics</span>
                        <span class="bg-slate-100 border border-light-green-200 text-slate-600 px-2 py-1 rounded text-sm">Leadership</span>
                        <span class="bg-slate-100 border border-light-green-200 text-slate-600 px-2 py-1 rounded text-sm">Agile</span>
                    </div>
                    <button class="w-full bg-light-green-400 hover:bg-light-green-500 text-white py-3 rounded-xl font-semibold flex items-center justify-center gap-2 transition-colors">
                        <i class="fas fa-paper-plane"></i>
                        Lamar Sekarang
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Alumni Map Section -->
    <section class="py-20 w-full bg-white" id="alumni">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-slate-800 mb-4">Peta Persebaran Alumni</h2>
                <p class="text-xl text-slate-600 max-w-3xl mx-auto">
                    Jangkauan alumni UPR tersebar di seluruh nusantara, mencerminkan kontribusi nyata terhadap pembangunan bangsa di berbagai sektor.
                </p>
            </div>

            <div class="bg-white rounded-3xl p-6 shadow-lg">
                <div id="map" class="w-full h-96  rounded-2xl mb-6"></div>

                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                    <div class="bg-slate-50 p-4 rounded-xl text-center">
                        <div class="font-bold text-slate-700 text-sm">Jakarta</div>
                        <div class="text-2xl font-bold text-light-green-500">486</div>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-xl text-center">
                        <div class="font-bold text-slate-700 text-sm">Jawa Barat</div>
                        <div class="text-2xl font-bold text-light-green-500">342</div>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-xl text-center">
                        <div class="font-bold text-slate-700 text-sm">Jawa Timur</div>
                        <div class="text-2xl font-bold text-light-green-500">298</div>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-xl text-center">
                        <div class="font-bold text-slate-700 text-sm">Kalimantan</div>
                        <div class="text-2xl font-bold text-light-green-500">756</div>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-xl text-center">
                        <div class="font-bold text-slate-700 text-sm">Sumatra</div>
                        <div class="text-2xl font-bold text-light-green-500">189</div>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-xl text-center">
                        <div class="font-bold text-slate-700 text-sm">Lainnya</div>
                        <div class="text-2xl font-bold text-light-green-500">776</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-20 w-full bg-slate-800 text-white" id="contact">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-8">
                    <h2 class="text-4xl font-bold text-light-green-300">Hubungi Kami</h2>
                    <p class="text-xl text-slate-300">
                        Ada pertanyaan tentang tracer study atau ingin bergabung dengan jaringan alumni? Jangan ragu untuk menghubungi kami.
                    </p>

                    <div class="space-y-6">
                        <div class="flex items-center gap-4 bg-white/10 backdrop-blur-sm p-4 rounded-2xl">
                            <div class="bg-light-green-400 w-12 h-12 rounded-xl flex items-center justify-center">
                                <i class="fas fa-envelope text-white"></i>
                            </div>
                            <div>
                                <div class="font-semibold">Email</div>
                                <div class="text-slate-300">ditrace@upr.ac.id</div>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 bg-white/10 backdrop-blur-sm p-4 rounded-2xl">
                            <div class="bg-light-green-400 w-12 h-12 rounded-xl flex items-center justify-center">
                                <i class="fas fa-phone text-white"></i>
                            </div>
                            <div>
                                <div class="font-semibold">Telepon</div>
                                <div class="text-slate-300">+62 536 3101755</div>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 bg-white/10 backdrop-blur-sm p-4 rounded-2xl">
                            <div class="bg-light-green-400 w-12 h-12 rounded-xl flex items-center justify-center">
                                <i class="fas fa-map-marker-alt text-white"></i>
                            </div>
                            <div>
                                <div class="font-semibold">Alamat</div>
                                <div class="text-slate-300">Universitas Palangka Raya<br>Jl. Hendrik Timang, Palangka Raya</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-3xl p-8 text-slate-800">
                    <h3 class="text-2xl font-bold mb-6 text-slate-800">Kirim Pesan</h3>
                    <form class="space-y-4">
                        <div>
                            <label class="block font-semibold mb-2">Nama Lengkap</label>
                            <input type="text" class="w-full p-4 border-2 border-slate-200 rounded-xl focus:border-light-green-400 focus:outline-none transition-colors">
                        </div>
                        <div>
                            <label class="block font-semibold mb-2">Email</label>
                            <input type="email" class="w-full p-4 border-2 border-slate-200 rounded-xl focus:border-light-green-400 focus:outline-none transition-colors">
                        </div>
                        <div>
                            <label class="block font-semibold mb-2">Subjek</label>
                            <input type="text" class="w-full p-4 border-2 border-slate-200 rounded-xl focus:border-light-green-400 focus:outline-none transition-colors">
                        </div>
                        <div>
                            <label class="block font-semibold mb-2">Pesan</label>
                            <textarea rows="4" class="w-full p-4 border-2 border-slate-200 rounded-xl focus:border-light-green-400 focus:outline-none transition-colors resize-none"></textarea>
                        </div>
                        <button type="submit" class="w-full bg-light-green-400 hover:bg-light-green-500 text-white py-4 rounded-xl font-semibold flex items-center justify-center gap-2 transition-colors">
                            <i class="fas fa-paper-plane"></i>
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        // Daftarkan geoJSON Indonesia ke ECharts
        echarts.registerMap('Indonesia', geoJson);

        var chart = echarts.init(document.getElementById('map'));

        var option = {
            title: {
                text: 'Peta Persebaran Contoh di Indonesia',
                left: 'center'
            },
            tooltip: {
                trigger: 'item',
                formatter: function(params) {
                    if (params.value == null) {
                        return params.name + ' : Tidak ada data';
                    }
                    return params.name + ' : ' + params.value;
                }
            },
            visualMap: {
                min: 0,
                max: 100,
                left: 'left',
                top: 'bottom',
                text: ['Banyak', 'Sedikit'],
                inRange: {
                    color: ['#e0f3f8', '#08589e']
                },
                calculable: true
            },
            series: [{
                name: 'Nilai Per Wilayah',
                type: 'map',
                map: 'Indonesia',
                roam: true,
                emphasis: {
                    label: {
                        show: true
                    }
                },
                data: [{
                        name: 'Jakarta Raya',
                        value: 80
                    },
                    {
                        name: 'Jawa Barat',
                        value: 60
                    },
                    {
                        name: 'Jawa Timur',
                        value: 40
                    },
                    {
                        name: 'Kalimantan Timur',
                        value: 20
                    },
                    {
                        name: 'Sulawesi Selatan',
                        value: 50
                    }
                ]
            }]
        };

        chart.setOption(option);
    </script>
</body>

</html>

</html>