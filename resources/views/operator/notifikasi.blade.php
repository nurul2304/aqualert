@extends('layouts.sidebar-operator')

@section('title', 'Notifikasi')

@section('content')
  <h1 class="text-3xl font-bold mb-6 mt-6 text-left">Notifikasi</h1>

  <div class="bg-white rounded-xl shadow p-6 mx-left">
    <div class="flex justify-between items-left mb-4">
        <h2 class="text-lg font-bold text-gray-800">Hari Ini</h2>
        <div class="space-x-2">
            <button class="bg-blue-500 text-white px-4 py-2 mb-6 rounded">Laporan</button>
            <button class="bg-gray-200 text-gray-800 px-4 py-2 mb-6 rounded">Kualitas Air</button>
        </div>
    </div>

    <!-- Daftar Notifikasi -->
    <div class="space-y-4">
        <div class="flex items-center justify-between p-4 rounded-lg shadow">
            <div>
                <p class="text-gray-800 font-semibold">Kebocoran Pipa</p>
            </div>
            <span class="bg-red-500 text-white px-3 py-1 rounded text-sm">Urgent</span>
        </div>

        <div class="flex items-center justify-between p-4 rounded-lg shadow">
            <div>
                <p class="text-gray-800 font-semibold">Kebocoran Pipa</p>
            </div>
            <span class="bg-red-500 text-white px-3 py-1 rounded text-sm">Urgent</span>
        </div>

        <div class="flex items-center justify-between p-4 rounded-lg shadow">
            <div>
                <p class="text-gray-800 font-semibold">Kebocoran Pipa</p>
            </div>
            <span class="bg-green-500 text-white px-3 py-1 rounded text-sm">Not Urgent</span>
        </div>
    </div>
  </div>
@endsection
