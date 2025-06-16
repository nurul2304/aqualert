<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>@yield('title', 'Operator')</title>

  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-gray-100 h-screen overflow-hidden">

  <div class="flex h-full relative">

    <!-- Overlay (for small screen) -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-40 z-30 hidden md:hidden"></div>

    <!-- Sidebar -->
    <aside id="sidebar" class="fixed top-0 left-0 z-40 w-64 h-full bg-blue-800 shadow-md transform -translate-x-full transition-transform duration-300 ease-in-out md:translate-x-0 md:static md:block">
      <div class="p-6 h-full flex flex-col justify-between">
        <div>
          <div class="text-center mb-6">
            <img src="{{ asset('images/logo2.png') }}" alt="Logo" class="mx-auto w-32">
          </div>

          <nav>
            <ul class="space-y-4 text-white font-bold">
              <li>
                <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded-lg hover:bg-blue-500 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-500' : '' }}">
                  <i class="fas fa-home mr-8"></i>Dashboard</a>
                </li>
              <li>
                <a href="{{ route('admin.visualdata') }}" class="block px-3 py-2 rounded-lg hover:bg-blue-500 {{ request()->routeIs('admin.visualdata') ? 'bg-blue-500' : '' }}">
                  <i class="fas fa-chart-pie mr-8"></i>Visual Data</a>
              </li>
              <li>
                <a href="{{ route('admin.laporan-masuk') }}" class="block px-3 py-2 rounded-lg hover:bg-blue-500 {{ request()->routeIs('admin.laporan-masuk') ? 'bg-blue-500' : '' }}">
                  <i class="fa-solid fa-file mr-8"></i>Laporan</a>
                </li>
              <li>
                <a href="{{ route('admin.manage-user') }}" class="block px-3 py-2 rounded-lg hover:bg-blue-500 {{ request()->routeIs('admin.manage-user') ? 'bg-blue-500' : '' }}">
                  <i class="fa-solid fa-users-gear mr-6"></i>Tambah Operator</a>
                </li>
              <li>
                <a href="{{ route('admin.notifikasi') }}" class="block px-3 py-2 rounded-lg hover:bg-blue-500 {{ request()->routeIs('admin.notifikasi') ? 'bg-blue-500' : '' }}">
                  <i class="fas fa-bell mr-8"></i>Notifikasi</a>
                </li>
            </ul>
          </nav>
        </div>
      </div>
    </aside>

    <!-- Content -->
    <div class="flex-1 flex flex-col overflow-hidden">

      <!-- Navbar -->
      <header class="bg-white shadow-md p-4 flex items-center justify-between z-30 relative">
        <button id="menu-toggle" class="md:hidden text-blue-800 focus:outline-none">
          <i class="fas fa-bars text-2xl"></i>
        </button>

        <div class="text-lg font-bold text-blue-800">Admin Panel</div>

        <div class="relative">
          <button class="flex items-center space-x-2 text-blue-800 focus:outline-none">
            <i class="fa solid fa-circle-user text-3xl"></i>

          </button>
        </div>
      </header>

      <!-- Main -->
      <main class="flex-1 overflow-y-auto p-4 md:p-8 relative z-10">
        @yield('content')
      </main>
    </div>
  </div>

  <!-- Toggle & Close on Click Outside -->
  <script>
  const toggleBtn = document.getElementById('menu-toggle');
  const sidebar = document.getElementById('sidebar');
  const overlay = document.getElementById('overlay');

  function openSidebar() {
    sidebar.classList.remove('-translate-x-full');
    overlay.classList.remove('hidden');
  }

  function closeSidebar() {
    sidebar.classList.add('-translate-x-full');
    overlay.classList.add('hidden');
  }

  function toggleSidebar() {
    const isOpen = !sidebar.classList.contains('-translate-x-full');
    if (isOpen) {
      closeSidebar();
    } else {
      openSidebar();
    }
  }

  toggleBtn.addEventListener('click', toggleSidebar);
  overlay.addEventListener('click', closeSidebar);

  // Combine both logic in one resize event
  window.addEventListener('resize', () => {
    const screenWidth = window.innerWidth;

    if (screenWidth >= 768) {
      // On large screen, show sidebar but hide overlay
      sidebar.classList.remove('-translate-x-full');
      overlay.classList.add('hidden');
    } else {
      // On small screen, hide sidebar and overlay
      closeSidebar();
    }
  });
</script>


  @yield('scripts')
</body>
</html>
