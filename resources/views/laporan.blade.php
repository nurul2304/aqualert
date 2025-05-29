@extends('layouts.app')

@section('title', 'Laporan')

@section('content')
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
  <h1 class="text-3xl font-bold mb-6 mt-6">Laporan</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Priority Chart -->
    <div class="bg-white rounded-xl shadow p-6">
        <div class="flex justify-between items-start mb-4">
            <h2 class="text-lg font-bold text-gray-800">Priority Chart</h2>
        </div>
        <canvas id="priorityChart" class="mb-4"></canvas>
        <div class="text-sm">
            <div class="flex items-center mb-1">
                <span class="w-3 h-3 rounded-full bg-red-500 mr-2"></span> Urgent — <strong class="ml-1">65 Report</strong>
            </div>
            <div class="flex items-center">
                <span class="w-3 h-3 rounded-full bg-green-500 mr-2"></span> Not Urgent — <strong class="ml-1">127 Report</strong>
            </div>
        </div>
    </div>

    <!-- Damage Classification Chart -->
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-bold text-gray-800 mb-4">Damage report classification</h2>
        <canvas id="damageChart" class="mb-4"></canvas>
        <div class="text-sm">
            <div class="flex items-center mb-1">
                <span class="w-3 h-3 rounded-full bg-blue-700 mr-2"></span> Pipa Bocor — <strong class="ml-1">65 Report</strong>
            </div>
            <div class="flex items-center mb-1">
                <span class="w-3 h-3 rounded-full bg-blue-500 mr-2"></span> Air Mati — <strong class="ml-1">50 Report</strong>
            </div>
            <div class="flex items-center">
                <span class="w-3 h-3 rounded-full bg-blue-300 mr-2"></span> Air Keruh — <strong class="ml-1">28 Report</strong>
            </div>
        </div>
    </div>
</div>


  <!-- Report List -->
  <div class="bg-white p-6 rounded-lg shadow mb-8 mb-8 mt-8 overflow-x-auto">
    <h3 class="text-lg font-bold mb-4">Report List</h3>
    <table class="w-full text-left">
      <thead>
        <tr class="text-gray-600 border-b">
          <th class="py-2">User Name</th>
          <th>Location</th>
          <th>Date - Time</th>
          <th>Description</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <tr class="border-b">
          <td class="py-2">Apple Watch</td>
          <td>6096 Marjolaine Landing</td>
          <td>12.09.2019 - 12.53 PM</td>
          <td>Ada kebocoran pipa di perumahan Buana Raya ...</td>
          <td><span class="bg-red-500 text-white px-2 py-1 rounded text-sm">Urgent</span></td>
        </tr>
      </tbody>
    </table>
  </div>
@endsection
