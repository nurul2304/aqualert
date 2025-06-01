@extends('layouts.sidebar-public')

@section('title', 'Daftar Laporan')

@section('content')
  <h1 class="text-3xl font-bold mb-6 mt-6 text-left">Daftar Laporan Anda</h1>

   <!-- Tombol berada di luar card -->
<div class="w-full flex justify-end">
    <a href="{{ route('add-report') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
        Tambah Laporan
    </a>
</div>

<!-- Card Daftar Laporan -->
    <div class="space-y-4 mt-8">
  <!-- Card 1 -->
  <div class="bg-white p-4 rounded-lg shadow flex justify-between items-center">
    <div>
      <h3 class="font-bold">Kekeruhan Air <span class="text-gray-500 text-sm ml-2">23 Feb, 2025</span></h3>
      <p class="text-sm text-gray-700 mt-3">Air di daerah saya keruh sekali, mohon diperbaiki</p>
    </div>
    <button class="bg-sky-400 text-white text-sm px-4 py-1 rounded-full">Send</button>
  </div>

  <!-- Card 2 -->
  <div class="bg-white p-4 rounded-lg shadow flex justify-between items-center">
    <div>
      <h3 class="font-bold">Kekeruhan Air <span class="text-gray-500 text-sm ml-2">23 Feb, 2025</span></h3>
      <p class="text-sm text-gray-700 mt-3">Air di daerah saya keruh sekali, mohon diperbaiki</p>
    </div>
    <button class="bg-sky-400 text-white text-sm px-4 py-1 rounded-full">Send</button>
  </div>

  <!-- Card 3 -->
  <div class="bg-white p-4 rounded-lg shadow flex justify-between items-center">
    <div>
      <h3 class="font-bold">Kekeruhan Air <span class="text-gray-500 text-sm ml-2">23 Feb, 2025</span></h3>
      <p class="text-sm text-gray-700 mt-3">Air di daerah saya keruh sekali, mohon diperbaiki</p>
    </div>
    <span class="bg-yellow-400 text-white text-sm px-4 py-1 rounded-full">In Progress</span>
  </div>
</div>



@endsection
