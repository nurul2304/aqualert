<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>@yield('title', 'Admin')</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
    .smooth-transition {
      transition: all 0.3s ease-in-out;
    }
  </style>
  @stack('head')
</head>
<body class="bg-slate-100 min-h-screen">

<div class="flex min-h-screen">
  <!-- Sidebar -->
  <aside id="sidebar" class="w-64 fixed top-0 left-0 flex flex-col bg-blue-700 text-slate-300 p-4 h-screen  smooth-transition">
    <div class="flex justify-center items-center h-16 shrink-0 mb-8 mt-2">
      <a href="#" class="block">
        <img src="{{ asset('images/logo1.png') }}" alt="Logo" class="max-w-[120px] w-full transition-all duration-300" />
      </a>
    </div>

    <!-- Menu Sidebar -->
    <nav class="flex-1 flex flex-col mt-8 space-y-4 mt-5">
      <a href="{{ route('admin.dashboard') }}" class="flex items-center p-3 rounded-lg {{ Request::routeIs('admin.dashboard') ? 'bg-white text-blue-700 font-semibold shadow-md' : 'hover:bg-blue-500 hover:text-white' }}">
        <svg class="h-6 w-6 shrink-0" fill="none" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l9-9 9 9M4.5 10.5V21h15V10.5"/>
        </svg>
        <span class="sidebar-text ml-4 whitespace-nowrap">Dashboard</span>
      </a>

      <a href="{{ route('admin.manage-user') }}" class="flex items-center p-3 rounded-lg {{ Request::routeIs('admin.manage-user') ? 'bg-white text-blue-700 font-semibold shadow-md' : 'hover:bg-blue-500 hover:text-white' }}">
        <svg class="h-6 w-6 shrink-0" fill="none" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-3-3h-2m-6 5H2v-2a3 3 0 013-3h2m3-6a4 4 0 110-8 4 4 0 010 8zm6 0a4 4 0 110-8 4 4 0 010 8z"/>
        </svg>
        <span class="sidebar-text ml-4 whitespace-nowrap">Manage User</span>
      </a>

      <a href="{{ route('admin.visualdata') }}" class="flex items-center p-3 rounded-lg {{ Request::routeIs('admin.visualdata') ? 'bg-white text-blue-700 font-semibold shadow-md' : 'hover:bg-blue-500 hover:text-white' }}">
        <svg class="h-6 w-6 shrink-0" fill="none" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3v18h18M9 17V9M15 17V5"/>
        </svg>
        <span class="sidebar-text ml-4 whitespace-nowrap">Visual Data</span>
      </a>

      <a href="{{ route('admin.laporan-masuk2') }}" class="flex items-center p-3 rounded-lg {{ Request::routeIs('admin.laporan') ? 'bg-white text-blue-700 font-semibold shadow-md' : 'hover:bg-blue-500 hover:text-white' }}">
        <svg class="h-6 w-6 shrink-0" fill="none" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7.5 3.75v16.5M13.5 3.75v4.5h4.5"/>
        </svg>
        <span class="sidebar-text ml-4 whitespace-nowrap">Laporan</span>
      </a>

      <a href="{{ route('admin.notifikasi') }}" class="flex items-center p-3 rounded-lg {{ Request::routeIs('admin.notifikasi') ? 'bg-white text-blue-700 font-semibold shadow-md' : 'hover:bg-blue-500 hover:text-white' }}">
        <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 00-5-5.917V5a2 2 0 10-4 0v.083A6 6 0 004 11v3.159c0 .538-.214 1.055-.595 1.436L2 17h5m5 0v1a3 3 0 11-6 0v-1m6 0H9"/>
        </svg>
        <span class="sidebar-text ml-4 whitespace-nowrap">Notifikasi</span>
      </a>

      <a href="#" class="flex items-center p-3 rounded-lg {{ Request::routeIs('admin.profil') ? 'bg-white text-blue-700 font-semibold shadow-md' : 'hover:bg-blue-500 hover:text-white' }}">
        <svg class="h-6 w-6 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
        </svg>
        <span class="sidebar-text ml-4 whitespace-nowrap">Account</span>
      </a>
    </nav>

    <!-- Bagian Bawah Sidebar-->
    <div class="mt-auto flex flex-col space-y-2">
      <button id="sidebar-toggle" class="flex items-center justify-center p-3 rounded-lg hover:bg-blue-500 hover:text-white">
        <svg class="h-6 w-6 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
        </svg>
        <span class="sidebar-text ml-4 whitespace-nowrap">Perkecil</span>
      </button>
      <!-- Tombol Logout -->
      <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button type="submit" class="flex items-center p-3 rounded-lg hover:bg-blue-500 hover:text-white w-full text-left">
            <svg class="h-6 w-6" ...>...</svg>
            <span class="sidebar-text ml-4 whitespace-nowrap">Log Out</span>
        </button>
    </form>
    </div>
  </aside>

  <!-- Konten Utama -->
  <main id="main-content" class="flex-1 p-6 md:p-10 ml-64 overflow-y-auto transition-all duration-300">
    @yield('content')
  </main>
</div>

<script>
  const sidebar = document.getElementById('sidebar');
  const mainContent = document.getElementById('main-content');
  const sidebarToggle = document.getElementById('sidebar-toggle');
  const sidebarTexts = document.querySelectorAll('.sidebar-text');
  const toggleIcon = sidebarToggle.querySelector('svg');

  sidebarToggle.addEventListener('click', () => {
    sidebar.classList.toggle('w-64');
    sidebar.classList.toggle('w-20');

    const isMinimized = sidebar.classList.contains('w-20');

     // Simpan state ke localStorage
    localStorage.setItem('sidebarMinimized', isMinimized);


    if (isMinimized) {
      mainContent.classList.remove('ml-64');
      mainContent.classList.add('ml-20');
    } else {
      mainContent.classList.remove('ml-20');
      mainContent.classList.add('ml-64');
    }

    sidebarTexts.forEach(text => {
      text.classList.toggle('hidden');
    });

    toggleIcon.classList.toggle('rotate-180');
  });

  // Saat halaman dimuat, cek state di localStorage
  window.addEventListener('DOMContentLoaded', () => {
    const isMinimized = localStorage.getItem('sidebarMinimized') === 'true';

    if (isMinimized) {
      sidebar.classList.remove('w-64');
      sidebar.classList.add('w-20');

      mainContent.classList.remove('ml-64');
      mainContent.classList.add('ml-20');

      sidebarTexts.forEach(text => text.classList.add('hidden'));
      toggleIcon.classList.add('rotate-180');
    }
  });

</script>

@yield('scripts')
</body>
</html>
