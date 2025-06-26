@extends('layouts.guest')

@section('title', 'Tambah Laporan')

@section('content')
<!-- Navbar (Mobile First) -->
<nav class="bg-blue-700 px-4 py-3 flex justify-between items-center text-white relative">
  <h1 class="text-lg font-semibold"></h1>

  @if ($errors->any())
  <div class="bg-red-100 text-red-800 p-4 rounded mb-6">
    <ul class="list-disc list-inside text-sm">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

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

<h2 class="text-3xl font-bold mb-6 mt-6 px-8 sm:px-8">Laporan</h2>

<div class="bg-gray-100 rounded-xl shadow p-6 min-h-screen mx-4 sm:mx-8">
  <form action="{{ route('public.report.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    <!-- Nama Pelapor -->
    <div class="flex flex-col md:flex-row md:items-center md:space-x-4">
      <label for="nama" class="w-full md:w-40 text-md font-medium text-gray-800 mb-2 md:mb-0">Nama Pelapor</label>
      <input id="nama" type="text" name="nama" class="w-full rounded-md border border-gray-300 shadow-sm p-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
    </div>

    <!-- Kontak -->
    <div class="flex flex-col md:flex-row md:items-center md:space-x-4">
      <label for="kontak" class="w-full md:w-40 text-md font-medium text-gray-800 mb-2 md:mb-0">Email/No HP</label>
      <input id="kontak" type="text" name="kontak" class="w-full rounded-md border border-gray-300 shadow-sm p-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
    </div>

    <!-- Judul -->
    <div class="flex flex-col md:flex-row md:items-center md:space-x-4">
      <label for="judul" class="w-full md:w-40 text-md font-medium text-gray-800 mb-2 md:mb-0">Judul</label>
      <input id="judul" type="text" name="judul" class="w-full rounded-md border border-gray-300 shadow-sm p-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
    </div>

    <!-- Deskripsi Kerusakan -->
    <div class="flex flex-col md:flex-row md:items-start md:space-x-4">
      <label for="deskripsi" class="w-full md:w-40 text-md font-medium text-gray-800 mb-2 md:mb-0">Deskripsi Kerusakan</label>
      <textarea id="deskripsi" name="deskripsi" rows="3" class="w-full rounded-md border border-gray-300 shadow-sm p-2 focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
    </div>

    <!-- Lokasi -->
    <div class="flex flex-col md:flex-row md:items-start md:space-x-4">
      <label for="lokasi" class="w-full md:w-40 text-md font-medium text-gray-800 mb-2 md:mb-0">Lokasi</label>
      <textarea id="lokasi" name="lokasi" rows="2" class="w-full rounded-md border border-gray-300 shadow-sm p-2 focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
    </div>

    <!-- Tingkat Urgensi -->
    <div class="flex flex-col md:flex-row md:items-center md:space-x-4">
      <label class="w-full md:w-40 text-md font-medium text-gray-800 mb-2 md:mb-0">Tingkat Urgensi</label>
      <select name="priority" class="w-full rounded-md border border-gray-300 shadow-sm p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
        <option value="low">Low</option>
        <option value="medium">Medium</option>
        <option value="high">High</option>
      </select>
    </div>

    <!-- Upload Gambar -->
    <div class="flex flex-col md:flex-row md:items-center md:space-x-4">
      <label class="w-full md:w-40 text-md font-medium text-gray-800 mb-2 md:mb-0" for="gambar">Masukkan Gambar</label>
      <label for="gambar" class="flex items-center justify-center w-full md:w-48 cursor-pointer text-white bg-blue-800 hover:bg-blue-900 font-semibold py-2 px-4 rounded">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
             xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1M4 12l1.41-1.41a2 2 0 012.83 0L12 15l3.76-3.76a2 2 0 012.83 0L20 12M12 3v12"></path>
        </svg>
        <span>Pilih Gambar</span>
      </label>
      <input id="gambar" type="file" name="gambar" class="hidden" accept="image/*" capture="environment"/>
      <span id="gambar-name" class="mt-2 text-sm text-gray-600"></span>
    </div>

    <script>
      const input = document.getElementById('gambar');
      const nameDisplay = document.getElementById('gambar-name');
      input.addEventListener('change', function () {
        if (this.files && this.files.length > 0) {
          nameDisplay.textContent = this.files[0].name;
        } else {
          nameDisplay.textContent = '';
        }
      });
    </script>

    <!-- Tombol Submit -->
    <div class="flex justify-end">
      <button type="submit" class="bg-blue-600 text-md text-white px-6 py-2 rounded-md w-32 mt-6 hover:bg-blue-700">
        Send
      </button>
    </div>
  </form>
</div>
@endsection
