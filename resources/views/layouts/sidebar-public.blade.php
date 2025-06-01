<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Daftar Laporan')</title>

  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body class="bg-gray-100 h-screen overflow-hidden">
  <div class="flex h-full">
    <!-- Sidebar -->
    <aside id="sidebar" class="fixed top-0 right-0 z-auto w-auto h-auto bg-white shadow-md transform translate-x-full transition-transform duration-300 ease-in-out md:relative md:translate-x-0 md:block">
      <div class="p-6 flex flex-col justify-between h-full">
        <div>
          <div class="text-center mb-6">
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="mx-auto w-24">
          </div>

          <nav>
            <ul class="space-y-4">
              <li>
                <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2 rounded font-semibold block 
                    {{ request()->routeIs('dashboard') ? 'bg-blue-500 text-white' : 'text-gray-700 hover:bg-gray-200' }}">
                    <i class="fas fa-home px-2 text-lg"></i>
                    <span>Dashboard</span>
                </a>
              </li>
            
              <li>
                <a href="{{ route('report-list') }}" class="flex items-center px-3 py-2 rounded font-semibold block 
                    {{ request()->routeIs('report-list') ? 'bg-blue-500 text-white' : 'text-gray-700 hover:bg-gray-200' }}">
                    <i class="fa-solid fa-file px-2 text-lg"></i>
                    <span>Laporan</span>
                </a>
              </li>
              <li>
                <a href="{{ route('notifikasi') }}" class="flex items-center px-3 py-2 rounded font-semibold block 
                  {{ request()->routeIs('notifikasi') ? 'bg-blue-500 text-white' : 'text-gray-700 hover:bg-gray-200' }}">
                  <i class="fas fa-bell px-2 text-lg"></i>
                  <span>Notifikasi</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </aside>

    <!-- Toggle button (mobile) -->
    <button id="menu-toggle" class="md:hidden fixed top-4 right-4 z-50 bg-white shadow p-2 rounded">
      <i class="fas fa-bars text-2xl"></i>
    </button>

    <!-- Main Content -->
    <main class="flex-1 overflow-y-auto md:ml-0 p-4 md:p-8">
      <div class="text-left">
        @yield('content')
      </div>
    </main>
  </div>
 <script>
    const toggleBtn = document.getElementById('menu-toggle');
    const sidebar = document.getElementById('sidebar');

    toggleBtn.addEventListener('click', () => {
      sidebar.classList.toggle('translate-x-full');
      sidebar.classList.toggle('translate-x-0');
    });
  </script>

  @yield('scripts') {{-- ✅ Ini penting agar script chart dari laporan.blade bisa dieksekusi --}}
  
</body>
</html>
