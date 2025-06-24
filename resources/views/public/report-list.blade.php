@extends('layouts.guest')

@section('title', 'Daftar Laporan')

@push('head')
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
  body {
    font-family: 'Inter', sans-serif;
  }
  .smooth-transition {
    transition: all 0.3s ease-in-out;
  }
</style>
@endpush

@section('content')

<!-- Navbar (Mobile First) -->
<nav class="bg-blue-700  px-4 py-3 flex justify-between items-center text-white relative">
  <h1 class="text-lg font-semibold"></h1>

  <!-- Dropdown Menu (Hamburger kanan) -->
  <div class="relative">
    <button id="dropdownToggle" class="p-2 rounded hover:bg-blue-800 focus:outline-none">
      <!-- Hamburger Icon -->
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
           viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round"
              stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>
    <!-- Dropdown -->
    <div id="dropdownMenu"
         class="hidden absolute right-0 mt-2 w-40 bg-white text-gray-800 rounded shadow z-50">
      <a href="report-list" class="block px-4 py-2 hover:bg-gray-100">Daftar Laporan</a>
      <a href="add-report" class="block px-4 py-2 hover:bg-gray-100">Buat Laporan</a>
    </div>
  </div>
</nav>

<script>
  document.getElementById('dropdownToggle').addEventListener('click', function () {
    document.getElementById('dropdownMenu').classList.toggle('hidden');
  });
</script>


<!-- Konten -->
<div class="max-w-5xl mx-auto px-4 py-8">
  <section id="daftar-laporan">
    <h1 class="text-2xl font-bold mb-6">📋 Daftar Laporan Anda</h1>

    <!-- Tombol Token & Tambah Laporan -->
      <div class="w-full flex justify-between mb-6">
        <form action="{{ route('public.status.lookup') }}" method="GET" class="flex gap-2">
          <input type="text" name="token" placeholder="Masukkan Token" required
                class="border rounded px-2 py-1 text-sm focus:outline-blue-500" />
          <button type="submit"
                  class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
            Kirim
          </button>
        </form>
      </div>

    <!-- Card Daftar Laporan -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      @if (isset($report))
        <div class="bg-white p-4 rounded-lg shadow hover:shadow-md transition hover:bg-gray-50 flex justify-between items-center">
          <div>
            <h3 class="font-bold">{{ $report->title }} <span class="text-gray-500 text-sm ml-2">{{ $report->created_at->format('d M, Y') }}</span></h3>
            <p class="text-sm text-gray-700 mt-3">{{ $report->description }}</p>
          </div>
          <span class="bg-yellow-400 text-white text-xs px-4 py-1 rounded-full whitespace-nowrap capitalize">
            {{ $report->status }}
          </span>
        </div>
      @else
        <p class="text-sm text-gray-600 italic mt-4">Belum ada data yang ditampilkan.</p>
      @endif
    </div>
  </section>

</div>
@endsection
