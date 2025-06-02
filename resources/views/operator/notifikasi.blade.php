@extends('layouts.sidebar-operator')

@section('title', 'Notifikasi')

@section('content')
  <h1 class="text-3xl font-bold mb-6 mt-6 text-left">Notifikasi</h1>

    <div class="flex justify-between items-center h-24 px-4 bg-gray-100">
        <h2 class="text-lg font-bold text-gray-800">Hari Ini</h2>
        <div class="space-x-4">
            <button class="bg-blue-500 text-white px-4 py-2 rounded">Laporan</button>
            <button class="bg-gray-200 text-gray-800 px-4 py-2 rounded">Kualitas Air</button>
        </div>
    </div>

    <!-- Daftar Notifikasi -->
    <div class="space-y-4 p-4 min-h-screen">
  <!-- Item -->
  <div class="flex items-center justify-between bg-white rounded-lg shadow p-4 h-24">
    <div class="flex items-center space-x-">
      <span class="text-gray-800 p-4">Kebocoran Pipa</span>
    </div>
    <span class="bg-red-500 text-white text-sm px-6 py-1 rounded-full">Urgent</span>
  </div>

  <!-- Item -->
  <div class="flex items-center justify-between bg-white rounded-lg shadow p-4">
    <div class="flex items-center space-x-3">
      <span class="text-gray-800 p-4">Kebocoran Pipa</span>
    </div>
    <span class="bg-red-500 text-white text-sm px-6 py-1 rounded-full">Urgent</span>
  </div>

  <!-- Item -->
  <div class="flex items-center justify-between bg-white rounded-lg shadow p-4">
    <div class="flex items-center space-x-3">
      <span class="text-gray-800 p-4">Kebocoran Pipa</span>
    </div>
    <span class="bg-red-500 text-white text-sm px-6 py-1 rounded-full">Urgent</span>
  </div>
</div>

@endsection
