@extends('layouts.sidebar-operator')

@section('title', 'Dashboard')

@section('content')
  <h1 class="text-3xl font-bold mb-6 mt-6">Dashboard</h1>

 <div class="grid grid-cols-2 gap-6 mb-8 overflow-x-auto">
  <div class="relative bg-white p-6 rounded-lg shadow overflow-x-auto">
    <img src="{{ asset('images/total_report.png') }}" alt="icon" class="absolute top-4 right-4 w-12 h-12">
    <p class="text-gray-600">Total Report</p>
    <h2 class="text-2xl font-bold">197</h2>
    <p class="text-red-500 text-sm mt-1">↓ 1.3% Up from past week</p>
  </div>

  <div class="relative bg-white p-6 rounded-lg shadow overflow-x-auto">
    <img src="{{ asset('images/water_quality.png') }}" alt="icon" class="absolute top-4 right-4 w-12 h-12">
    <p class="text-gray-600">Water Quality</p>
    <h2 class="text-2xl font-bold">pH 6,5</h2>
    <p class="text-red-500 text-sm mt-1">↓ 1.2% Down from yesterday</p>
  </div>
</div>


  <!-- Report List -->
  <div class="bg-white p-6 rounded-lg shadow mb-8 mb-8 overflow-x-auto">
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

  <!-- Sensor Details -->
  <div class="bg-white p-6 rounded-lg shadow">
    <h3 class="text-lg font-bold mb-4">Sensor Details</h3>
    <table class="w-full text-left">
      <thead>
        <tr class="text-gray-600 border-b">
          <th class="py-2">Device Name</th>
          <th>Location</th>
          <th>Date - Time</th>
          <th>Turbidity</th>
          <th>TDS</th>
          <th>pH</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <tr class="border-b">
          <td class="py-2">Apple Watch</td>
          <td>N 1° 8' 45.0744", E 103° 37' 59.7108"</td>
          <td>12.09.2019 - 12.53 PM</td>
          <td>20 NTU</td>
          <td>423</td>
          <td>pH 6</td>
          <td><span class="bg-green-500 text-white px-2 py-1 rounded text-sm">Good</span></td>
        </tr>
      </tbody>
    </table>
  </div>
@endsection

