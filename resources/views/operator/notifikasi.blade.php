@extends('layouts.sidebar-operator')

@section('title', 'Notifikasi')

@section('content')
  <h1 class="text-3xl font-bold mb-6 mt-6 text-left">Notifikasi</h1>

  <div class="flex justify-between items-center h-16 px-4 bg-gray-100 rounded-md mb-6">
      <h2 class="text-lg font-bold text-gray-800">Hari Ini</h2>

  </div>

  <!-- Dummy data -->
  @php
    $notifications = [
      [
        'notification_id' => 1,
        'user_id' => 101,
        'message' => 'Laporan baru masuk dari Jalan Kenanga.',
        'status' => 'unread',
        'created_at' => now()->subMinutes(5)
      ],
      [
        'notification_id' => 2,
        'user_id' => 102,
        'message' => 'Kualitas air menurun di Buana Raya.',
        'status' => 'read',
        'created_at' => now()->subHours(2)
      ],
      [
        'notification_id' => 3,
        'user_id' => 103,
        'message' => 'Laporan Anda telah ditandai sebagai selesai.',
        'status' => 'unread',
        'created_at' => now()->subDays(1)
      ],
    ];
  @endphp

  <!-- Notifikasi Container -->
  <div class="bg-white p-6 rounded-lg shadow max-w-7xl mx-auto mt-2">
    
    <div class="space-y-4">
      @foreach ($notifications as $notification)
  <div 
    onclick="markAsRead({{ $notification['notification_id'] }})"
    class="cursor-pointer flex justify-between items-start 
      {{ $notification['status'] === 'unread' ? 'bg-blue-50 border-blue-500 font-semibold' : 'bg-gray-50 border-gray-300' }} 
      border-l-4 p-4 rounded relative hover:bg-blue-100 transition">

    <div class="pr-6">
      <p class="text-sm text-gray-800">{{ $notification['message'] }}</p>
      <span class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($notification['created_at'])->diffForHumans() }}</span>
    </div>

    @if ($notification['status'] === 'unread')
      <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full"></span>
    @endif
  </div>
@endforeach

    </div>
  </div>
@endsection
