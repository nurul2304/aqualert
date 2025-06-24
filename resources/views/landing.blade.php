<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AquaAlert</title>

  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Smooth scroll -->
  <style>
    html {
      scroll-behavior: smooth;
    }
  </style>
</head>
<body class="bg-blue-50 text-gray-800 font-sans">

<!-- Navbar -->
<header class="bg-blue-700 text-white fixed top-0 left-0 w-full z-50 shadow-md">
  <div class="container mx-auto px-6 py-4 flex justify-between items-center">
    <h1 class="text-xl font-bold">AquaAlert</h1>

    <!-- Desktop Menu -->
    <nav class="hidden md:flex space-x-4 items-center">
      <a href="#beranda" class="px-3 py-2 rounded hover:bg-blue-600">Beranda</a>
      <a href="#tentang" class="px-3 py-2 rounded hover:bg-blue-600">Tentang Kami</a>
      <a href="#fitur" class="px-3 py-2 rounded hover:bg-blue-600">Fitur</a>

      <!-- Dropdown -->
      <div class="relative group">
        <button class="px-4 py-2 bg-white text-blue-900 rounded hover:bg-blue-300 transition duration-200">
          Masuk
        </button>
        <div class="absolute hidden group-hover:block bg-white text-blue-900 shadow rounded mt-1 w-40 right-0 z-50">
          <a href="/admin/login" class="block px-4 py-2 hover:bg-blue-100">Masuk Admin</a>
          <a href="/operator/login" class="block px-4 py-2 hover:bg-blue-100">Masuk Operator</a>
        </div>
      </div>
    </nav>

    <!-- Toggle Mobile Menu -->
    <button id="menu-toggle" class="md:hidden focus:outline-none">
      <i class="fas fa-bars text-xl"></i>
    </button>
  </div>

  <!-- Mobile Dropdown Menu -->
  <div id="mobile-menu" class="hidden md:hidden px-6 pb-4">
    <a href="#beranda" class="block px-3 py-2 rounded hover:bg-blue-600">Beranda</a>
    <a href="#tentang" class="block px-3 py-2 rounded hover:bg-blue-600">Tentang Kami</a>
    <a href="#fitur" class="block px-3 py-2 rounded hover:bg-blue-600">Fitur</a>

    <!-- Dropdown Login (Mobile) -->
    <div class="mt-2 bg-white text-blue-900 rounded shadow">
      <span class="block px-4 py-2 font-semibold">Masuk</span>
      <a href="/admin/login" class="block px-4 py-2 hover:bg-blue-100">Masuk Admin</a>
      <a href="/operator/login" class="block px-4 py-2 hover:bg-blue-100">Masuk Operator</a>
    </div>
  </div>
</header>

  <!-- HERO -->
  <section id="beranda" class="relative h-screen text-white flex items-start justify-start bg-no-repeat bg-cover bg-center" style="background-image: url('/images/bg_landingpage2.png');">
    <div class="absolute inset-0 bg-blue-900 bg-opacity-50"></div>

    <div class="relative z-10 px-8 pt-48 max-w-3xl">
      <h2 class="text-4xl font-bold mb-4 drop-shadow-lg leading-tight">Laporkan & Pantau Kualitas Air di Sekitarmu!</h2>
      <p class="text-lg drop-shadow max-w-xl">Platform digital untuk melaporkan kerusakan infrastruktur air dan memantau kualitas air secara real-time.</p>
      <a href="#daftar" class="mt-6 inline-block bg-white text-blue-900 text-md px-6 py-2 rounded hover:bg-blue-300 transition duration-200">Lapor</a>
    </div>
  </section>

  <!-- TENTANG KAMI -->
  <section id="tentang" class="bg-white py-16 px-6">
    <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-8 items-center">
      <img src="/images/tentang_kami.png" alt="tentang kami" class="order-last md:order-first rounded-lg w-full md:w-[80%] mx-auto" />
      <div class="text-center md:text-left">
        <h3 class="text-3xl font-bold mb-4">Tentang Kami</h3>
        <p class="text-lg">AquaAlert dirancang untuk membantu masyarakat menginformasikan kerusakan infrastruktur air dan menjaga kelancaran distribusi air bersih melalui penanganan yang cepat dan efisien.</p>
      </div>
    </div>
  </section>

  <!-- FITUR UNGGULAN -->
  <section id="fitur" class="bg-blue-100 py-16 px-6">
    <div class="max-w-6xl mx-auto">
      <h3 class="text-3xl font-bold text-center mb-10">Fitur Unggulan</h3>
      <div class="grid md:grid-cols-2 gap-10 items-center">
        <img src="/images/fitur.png" alt="fitur" class="order-last md:order-first rounded-lg w-full md:w-[80%] mx-auto" />
        <div class="grid gap-6">
          <div class="bg-white p-4 rounded-md drop-shadow-lg text-center text-sm">
            <h4 class="font-semibold mb-1">Pelaporan Kerusakan</h4>
            <p>Laporkan masalah infrastruktur air secara cepat dan mudah.</p>
          </div>
          <div class="bg-white p-4 rounded-md shadow text-center text-sm">
            <h4 class="font-semibold mb-1">Pantauan Kualitas Air</h4>
            <p>Lihat data kualitas air real-time di sekitarmu.</p>
          </div>
          <div class="bg-white p-4 rounded-md shadow text-center text-sm">
            <h4 class="font-semibold mb-1">Notifikasi Tanggap Darurat</h4>
            <p>Dapatkan peringatan dini jika terdeteksi kerusakan serius.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="bg-gradient-to-b from-blue-800 to-blue-900 text-white text-sm py-10 px-6">
    <div class="max-w-6xl mx-auto grid md:grid-cols-3 gap-6 text-center md:text-left">
      <div>
        <h5 class="text-lg font-bold mb-2">AquaAlert</h5>
        <p class="text-gray-300">Sistem monitoring dan pelaporan infrastruktur air berbasis komunitas.</p>
      </div>
      <div>
        <h5 class="font-bold mb-2">Kontak</h5>
        <p>Email: <a href="mailto:3726mdigdigjagat@gmail.com" class="text-blue-200 hover:underline">3726mdigdigjagat@gmail.com</a></p>
        <p>Telepon: +62 851 1982 3746</p>
        <p>Jl. Agraris Sorebaja No. 24</p>
      </div>
      <div>
        <h5 class="font-bold mb-2">Ikuti Kami</h5>
        <div class="flex justify-center md:justify-start gap-4">
          <a href="#">
            <i class="fa-brands fa-facebook"></i>
          </a>
          <a href="#">
            <i class="fa-brands fa-instagram"></i>
          </a>
          <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
        </div>
      </div>
    </div>
    <div class="mt-6 text-center text-gray-400">&copy; 2025 DigiGoat. All rights reserved.</div>
  </footer>

<!-- JS untuk toggle menu -->
<script>
  const toggleBtn = document.getElementById('menu-toggle');
  const mobileMenu = document.getElementById('mobile-menu');

  toggleBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
  });
</script>

</body>
</html>
