@extends('layouts.sidebar-public')

@section('title', 'Tambah Laporan')

@section('content')

 <div class="mb-4">
    <a href="/public/report-list" class="inline-flex items-center text-2xl text-sky-600 hover:text-sky-800 font-medium">
      <svg class="w-8 h-8 mr-2" fill="none" stroke="currentColor" stroke-width="2"
        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round"
          d="M15 19l-7-7 7-7" />
      </svg>
      Kembali
    </a>
  </div>

  <h2 class="text-3xl font-bold mb-6 mt-6 text-left">Laporan</h2>

<div class="bg-white rounded-xl shadow p-6 min-h-screen">
  <form action="#" method="POST" enctype="multipart/form-data" class="space-y-6">
  
  <!-- Nama Pelapor -->
<div class="flex items-center space-x-4 mt-8">
  <label for="nama" class="w-40 text-md font-medium text-gray-800">Nama Pelapor</label>
  <input id="nama" type="text" name="nama" class="flex-1 rounded-md border border-gray-300 shadow-sm p-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
</div>

<div class="flex items-center space-x-4">
  <label for="kontak" class="w-40 text-md font-medium text-gray-800">Email/No hp</label>
  <input id="kontak" type="text" name="kontak" class="flex-1 rounded-md border border-gray-300 p-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400" />
</div>

<!-- Jenis Kerusakan -->
<div class="flex items-center space-x-4">
  <label for="jenis" class="w-40 text-md font-medium text-gray-800">Jenis Kerusakan</label>
  <input id="jenis" type="text" name="jenis" class="flex-1 rounded-md border border-gray-300 shadow-sm p-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
</div>

<!-- Deskripsi Kerusakan -->
<div class="flex items-center space-x-4">
  <label for="deskripsi" class="w-40 text-md font-medium text-gray-800">Deskripsi Kerusakan</label>
  <textarea id="deskripsi" name="deskripsi" rows="3" class="flex-1 rounded-md border border-gray-300 shadow-sm p-2 focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
</div>

<!-- Lokasi -->
<div class="flex items-center space-x-4">
  <label for="lokasi" class="w-40 text-md font-medium text-gray-800">Lokasi</label>
  <textarea id="lokasi" name="lokasi" rows="2" class="flex-1 rounded-md border border-gray-300 shadow-sm p-2 focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
</div>

<!-- Tanggal Pelaporan -->
<div class="flex items-center space-x-4">
  <label for="tanggal" class="w-40 text-md font-medium text-gray-800">Tanggal Pelaporan</label>
  <input id="tanggal" type="date" name="tanggal" class="flex-1 rounded-md border border-gray-300 shadow-sm p-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
</div>

<!-- Upload Gambar -->
<div class="flex items-center space-x-4">
  <label class="w-40 text-md font-medium text-gray-800 mb-2" for="gambar">Masukkan Gambar</label>
  <label for="gambar" class="flex items-center justify-center w-48 cursor-pointer text-white bg-blue-800 hover:bg-blue-900 font-semibold py-2 px-4 rounded">
    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
      xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round"
        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1M4 12l1.41-1.41a2 2 0 012.83 0L12 15l3.76-3.76a2 2 0 012.83 0L20 12M12 3v12">
      </path>
    </svg>
    <span>Pilih Gambar</span>
  </label>
  <input id="gambar" type="file" name="gambar" class="hidden" />
</div>

<!-- Tombol Submit -->
<div class="flex justify-end">
  <button type="submit" class="bg-blue-600 block text-md text-white px-6 py-2 rounded-md w-32 mt-6 hover:bg-blue-700">
    Send
  </button>
</div>


@endsection