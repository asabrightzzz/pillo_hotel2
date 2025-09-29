<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Kaliana Suites - Pengalaman Menginap Mewah</title>
    <!-- Memuat Tailwind CSS CDN untuk styling modern dan responsif -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Memuat Lucide Icons untuk ikon-ikon yang elegan -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <style>
        /* Menggunakan font Inter untuk teks biasa dan Playfair Display untuk judul */
        body { font-family: 'Inter', sans-serif; }
        .hero-title, .section-title { font-family: 'Playfair Display', serif; }

        /* Kustomisasi warna tema (Ungu gelap dan Emas) */
        :root {
            --primary-color: #9858e5; /* Ungu gelap yang elegan */
            --accent-color: #d69e2e;  /* Emas tua */
        }
        .bg-primary { background-color: #1a1a2e; }
        .text-primary { color: var(--primary-color); }
        .text-accent { color: var(--accent-color); }
        .border-accent { border-color: var(--accent-color); }
        .btn-primary { background-color: var(--primary-color); }
        .btn-primary:hover { background-color: #8347d4; }
    </style>
</head>
<body class="bg-primary text-gray-100 antialiased">

    <!-- Navbar -->
    <header class="sticky top-0 z-50 bg-primary/95 backdrop-blur-sm shadow-lg">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
            <!-- Logo -->
            <a href="#" class="text-3xl font-bold text-white tracking-widest hero-title">Kaliana <span class="text-accent">Suites</span></a>
            
            <!-- Navigasi Desktop -->
            <nav class="hidden lg:flex space-x-8">
                <a href="#home" class="text-gray-300 hover:text-accent transition duration-300">Beranda</a>
                <a href="#rooms" class="text-gray-300 hover:text-accent transition duration-300">Kamar</a>
                <a href="#facility" class="text-gray-300 hover:text-accent transition duration-300">Fasilitas</a>
                <a href="#contact" class="text-gray-300 hover:text-accent transition duration-300">Kontak</a>
            </nav>

            <!-- Tombol Admin Login -->
            <button onclick="openModal('adminLoginModal')" class="hidden lg:block bg-accent text-primary px-5 py-2 rounded-lg font-semibold shadow-xl hover:bg-yellow-600 transition duration-300 transform hover:scale-105">
                Admin Login
            </button>

            <!-- Mobile Menu Button & Admin Login Mobile -->
            <div class="flex lg:hidden items-center space-x-3">
                <button onclick="openModal('adminLoginModal')" class="bg-accent text-primary p-2 rounded-full shadow-lg">
                    <i data-lucide="lock" class="w-5 h-5"></i>
                </button>
                <button id="mobileMenuButton" class="text-white focus:outline-none">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- Mobile Menu Drawer (Hidden by default) -->
    <div id="mobileMenu" class="fixed inset-y-0 left-0 w-64 bg-primary z-50 transform -translate-x-full transition-transform duration-300 lg:hidden shadow-2xl">
        <div class="p-6">
            <h2 class="text-2xl font-bold text-accent mb-6">Menu</h2>
            <nav class="flex flex-col space-y-4">
                <a href="#home" class="text-gray-300 hover:text-accent transition duration-300 border-b border-gray-700 pb-2">Beranda</a>
                <a href="#rooms" class="text-gray-300 hover:text-accent transition duration-300 border-b border-gray-700 pb-2">Kamar</a>
                <a href="#facility" class="text-gray-300 hover:text-accent transition duration-300 border-b border-gray-700 pb-2">Fasilitas</a>
                <a href="#contact" class="text-gray-300 hover:text-accent transition duration-300 pb-2">Kontak</a>
            </nav>
        </div>
    </div>
    <div id="mobileMenuOverlay" class="fixed inset-0 bg-black/50 z-40 hidden" onclick="closeMobileMenu()"></div>

    <!-- MAIN CONTENT -->
    <main>
        <!-- Hero Section -->
        <section id="home" class="relative h-[80vh] flex items-center justify-center overflow-hidden">
            <!-- Background Image -->
            <img src="https://placehold.co/1920x1080/1a1a2e/d69e2e?text=Luxury+Hotel+Lobby" alt="Lobi Hotel Mewah" 
                 class="absolute inset-0 w-full h-full object-cover opacity-40">
            <div class="absolute inset-0 bg-black/30"></div>
            
            <!-- Hero Content -->
            <div class="relative z-10 text-center px-4 max-w-4xl">
                <p class="text-xl text-accent mb-4 uppercase tracking-widest">Temukan Ketenangan Anda</p>
                <h1 class="hero-title text-6xl md:text-8xl font-extrabold text-white leading-tight mb-8">
                    The <span class="text-accent">Kaliana</span> Suites
                </h1>
                <p class="text-lg md:text-xl text-gray-300 mb-10">
                    Kombinasi sempurna antara kemewahan modern dan layanan personal.
                </p>
                <a href="#rooms" class="btn-primary inline-block text-white px-8 py-3 rounded-full text-lg font-medium shadow-2xl transition duration-300 transform hover:scale-105">
                    Lihat Kamar & Tarif
                </a>
            </div>
        </section>

        <!-- Room Showcase Section -->
        <section id="rooms" class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-900">
            <div class="container mx-auto">
                <h2 class="section-title text-4xl md:text-5xl font-bold text-center mb-16 text-white">Pilihan Kamar Kami</h2>
                
                <div class="grid md:grid-cols-3 gap-10">
                    <!-- Room Card 1 -->
                    <div class="bg-primary rounded-xl overflow-hidden shadow-2xl transform hover:scale-[1.02] transition duration-500">
                        <img src="https://placehold.co/600x400/2c2c47/FFFFFF?text=Deluxe+Room" alt="Deluxe Room" class="w-full h-56 object-cover">
                        <div class="p-6">
                            <h3 class="text-2xl font-semibold text-accent mb-2">Deluxe Ocean View</h3>
                            <p class="text-gray-400 mb-4">Kenyamanan modern dengan pemandangan laut yang menenangkan.</p>
                            <p class="text-3xl font-bold text-white">Rp 1.500.000 <span class="text-sm font-normal text-gray-500">/ malam</span></p>
                        </div>
                    </div>

                    <!-- Room Card 2 -->
                    <div class="bg-primary rounded-xl overflow-hidden shadow-2xl transform hover:scale-[1.02] transition duration-500">
                        <img src="https://placehold.co/600x400/2c2c47/FFFFFF?text=Executive+Suite" alt="Executive Suite" class="w-full h-56 object-cover">
                        <div class="p-6">
                            <h3 class="text-2xl font-semibold text-accent mb-2">Executive Suite</h3>
                            <p class="text-gray-400 mb-4">Ruang luas, bathtub mewah, dan layanan pribadi eksklusif.</p>
                            <p class="text-3xl font-bold text-white">Rp 3.800.000 <span class="text-sm font-normal text-gray-500">/ malam</span></p>
                        </div>
                    </div>

                    <!-- Room Card 3 -->
                    <div class="bg-primary rounded-xl overflow-hidden shadow-2xl transform hover:scale-[1.02] transition duration-500">
                        <img src="https://placehold.co/600x400/2c2c47/FFFFFF?text=Presidential+Villa" alt="Presidential Villa" class="w-full h-56 object-cover">
                        <div class="p-6">
                            <h3 class="text-2xl font-semibold text-accent mb-2">Presidential Villa</h3>
                            <p class="text-gray-400 mb-4">Privasi total dengan kolam renang pribadi dan butler 24 jam.</p>
                            <p class="text-3xl font-bold text-white">Rp 8.500.000 <span class="text-sm font-normal text-gray-500">/ malam</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Facilities Section -->
        <section id="facility" class="py-20 px-4 sm:px-6 lg:px-8 bg-primary">
            <div class="container mx-auto">
                <h2 class="section-title text-4xl md:text-5xl font-bold text-center mb-16 text-white">Fasilitas Unggulan</h2>
                
                <div class="grid grid-cols-2 md:grid-cols-4 gap-10 text-center">
                    <!-- Facility 1 -->
                    <div class="flex flex-col items-center p-6 bg-gray-900 rounded-xl shadow-xl">
                        <i data-lucide="pool" class="w-12 h-12 text-accent mb-4"></i>
                        <h4 class="text-xl font-semibold text-white">Infinity Pool</h4>
                        <p class="text-gray-400 text-sm mt-2">Kolam renang dengan batas horizon yang menakjubkan.</p>
                    </div>

                    <!-- Facility 2 -->
                    <div class="flex flex-col items-center p-6 bg-gray-900 rounded-xl shadow-xl">
                        <i data-lucide="utensils" class="w-12 h-12 text-accent mb-4"></i>
                        <h4 class="text-xl font-semibold text-white">Fine Dining</h4>
                        <p class="text-gray-400 text-sm mt-2">Restoran gourmet bintang lima dengan pemandangan kota.</p>
                    </div>

                    <!-- Facility 3 -->
                    <div class="flex flex-col items-center p-6 bg-gray-900 rounded-xl shadow-xl">
                        <i data-lucide="dumbbell" class="w-12 h-12 text-accent mb-4"></i>
                        <h4 class="text-xl font-semibold text-white">Fitness Center</h4>
                        <p class="text-gray-400 text-sm mt-2">Peralatan kebugaran terbaru, buka 24 jam.</p>
                    </div>

                    <!-- Facility 4 -->
                    <div class="flex flex-col items-center p-6 bg-gray-900 rounded-xl shadow-xl">
                        <i data-lucide="spa" class="w-12 h-12 text-accent mb-4"></i>
                        <h4 class="text-xl font-semibold text-white">Luxurious Spa</h4>
                        <p class="text-gray-400 text-sm mt-2">Perawatan relaksasi lengkap dengan terapis profesional.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="bg-gray-900 py-20 px-4 sm:px-6 lg:px-8">
            <div class="container mx-auto text-center p-10 rounded-2xl bg-primary/80 shadow-3xl border border-accent/20">
                <h2 class="section-title text-4xl font-bold mb-4 text-accent">Siap untuk Pengalaman Terbaik Anda?</h2>
                <p class="text-xl text-gray-300 mb-8">Pesan kamar Anda sekarang dan nikmati layanan tak tertandingi.</p>
                <button class="bg-accent text-primary px-8 py-4 rounded-full text-xl font-semibold shadow-2xl hover:bg-yellow-600 transition duration-300 transform hover:scale-105">
                    Pesan Sekarang
                </button>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer id="contact" class="bg-gray-900 border-t border-accent/30 py-10">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-2 md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-xl font-semibold text-accent mb-4 hero-title">Kaliana Suites</h3>
                <p class="text-gray-400 text-sm">Hotel bintang 5 yang menggabungkan keindahan alam dan fasilitas terbaik.</p>
            </div>
            <div>
                <h4 class="text-lg font-semibold text-white mb-4">Tautan Cepat</h4>
                <ul class="space-y-2">
                    <li><a href="#rooms" class="text-gray-400 hover:text-accent transition duration-300">Kamar & Suite</a></li>
                    <li><a href="#facility" class="text-gray-400 hover:text-accent transition duration-300">Fasilitas</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-accent transition duration-300">Syarat & Ketentuan</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-lg font-semibold text-white mb-4">Hubungi Kami</h4>
                <p class="text-gray-400">Jl. Keindahan No. 88, Jakarta</p>
                <p class="text-gray-400">reservasi@kaliana.com</p>
                <p class="text-gray-400">+62 21 8765 4321</p>
            </div>
            <div>
                <h4 class="text-lg font-semibold text-white mb-4">Admin Area</h4>
                <button onclick="openModal('adminLoginModal')" class="text-white bg-primary px-4 py-2 rounded-lg border border-accent/50 hover:bg-gray-800 transition duration-300">
                    Masuk ke Dashboard
                </button>
            </div>
        </div>
        <div class="text-center text-gray-600 mt-10 text-sm">
            &copy; 2025 The Kaliana Suites. All rights reserved.
        </div>
    </footer>

    <!-- Admin Login Modal -->
    <div id="adminLoginModal" class="fixed inset-0 bg-black/70 z-[100] hidden flex items-center justify-center p-4 transition-opacity duration-300 opacity-0">
        <div class="bg-gray-800 rounded-xl shadow-3xl w-full max-w-md p-8 transform scale-95 transition-transform duration-300">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-accent hero-title">Admin Login</h3>
                <button onclick="closeModal('adminLoginModal')" class="text-gray-400 hover:text-white transition">
                    <i data-lucide="x" class="w-6 h-6"></i>
                </button>
            </div>
            
            <form id="adminLoginForm" onsubmit="handleAdminLogin(event)">
                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-300 mb-1">Username</label>
                    <input type="text" id="username" name="username" class="w-full px-4 py-2 rounded-lg bg-gray-900 border border-gray-700 focus:border-accent focus:ring focus:ring-accent/50 text-white" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-300 mb-1">Password</label>
                    <input type="password" id="password" name="password" class="w-full px-4 py-2 rounded-lg bg-gray-900 border border-gray-700 focus:border-accent focus:ring focus:ring-accent/50 text-white" required>
                </div>
                
                <p id="loginMessage" class="text-sm text-center mb-4 hidden"></p>

                <button type="submit" class="btn-primary w-full text-white px-4 py-2 rounded-lg font-semibold shadow-lg transition duration-300">
                    Masuk
                </button>
            </form>
        </div>
    </div>

    <!-- JavaScript untuk Interaktivitas -->
    <script>
        // Inisialisasi Lucide Icons
        lucide.createIcons();

        // --- Logika Modal ---
        function openModal(id) {
            const modal = document.getElementById(id);
            modal.classList.remove('hidden', 'opacity-0');
            modal.classList.add('flex', 'opacity-100');
            
            // Animasi transform
            const content = modal.querySelector(':nth-child(1)');
            content.classList.remove('scale-95');
            content.classList.add('scale-100');
        }

        function closeModal(id) {
            const modal = document.getElementById(id);
            const content = modal.querySelector(':nth-child(1)');
            
            // Animasi transform
            content.classList.remove('scale-100');
            content.classList.add('scale-95');

            modal.classList.remove('opacity-100');
            modal.classList.add('opacity-0');

            // Sembunyikan setelah animasi (300ms)
            setTimeout(() => {
                modal.classList.remove('flex');
                modal.classList.add('hidden');
            }, 300);
        }

        // --- Logika Mobile Menu ---
        document.getElementById('mobileMenuButton').addEventListener('click', () => {
            document.getElementById('mobileMenu').classList.remove('-translate-x-full');
            document.getElementById('mobileMenuOverlay').classList.remove('hidden');
        });

        function closeMobileMenu() {
            document.getElementById('mobileMenu').classList.add('-translate-x-full');
            document.getElementById('mobileMenuOverlay').classList.add('hidden');
        }

        // Tutup menu saat link di klik (di mobile)
        document.querySelectorAll('#mobileMenu a').forEach(link => {
            link.addEventListener('click', closeMobileMenu);
        });

        // --- Logika Simulasi Login Admin ---
        function handleAdminLogin(event) {
            event.preventDefault();

            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            const messageElement = document.getElementById('loginMessage');
            messageElement.classList.remove('hidden');

            // RESET MESSAGE
            messageElement.textContent = '';
            messageElement.classList.remove('text-red-400', 'text-green-400');
            
            // --- INI ADALAH TEMPAT UNTUK KODE AUTHENTIKASI LARAVEL JIKA ANDA MENGGUNAKAN BLADE ---
            // Di Laravel, Anda akan mengirimkan form ini ke route POST yang ditangani
            // oleh AdminController, dan Controller akan memproses Auth::attempt()
            // Simulasi Autentikasi: Ganti dengan logika backend nyata (misalnya Firebase Auth/API)
            if (username === 'admin' && password === '12345') {
                messageElement.classList.add('text-green-400');
                messageElement.textContent = 'Login Berhasil! Mengarahkan ke Dashboard...';
                
                // Simulasikan redirect setelah 1.5 detik
                setTimeout(() => {
                    // Di aplikasi nyata Laravel, Anda akan diarahkan ke route admin/dashboard
                    // window.location.href = '/admin/dashboard';
                    alert('Simulasi Redirect Berhasil! Selamat datang, Admin!'); 
                    closeModal('adminLoginModal');
                    // Reset form
                    document.getElementById('adminLoginForm').reset();
                }, 1500);

            } else {
                messageElement.classList.add('text-red-400');
                messageElement.textContent = 'Username atau Password salah. (Hint: admin/12345)';
            }
        }
    </script>
</body>
</html>
