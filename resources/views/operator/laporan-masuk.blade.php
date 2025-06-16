@extends('layouts.sidebar-operator')

@section('title', 'Laporan')

@section('content')
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
  <h1 class="text-3xl font-bold mb-6 mt-6">Laporan Masuk</h1>

    <div class="grid grid-cols-3 gap-6">
    <!-- Priority Chart -->
    <div class="bg-white rounded-xl shadow p-6">
        <div class="flex justify-between items-start mb-4">
            <h2 class="text-lg font-bold text-gray-800">Priority Chart</h2>
        </div>
        <canvas id="priorityChart" class="flex items-center mb-4 w-full max-w-sm h-24"></canvas>
    </div>

    <!-- Damage Classification Chart -->
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-bold text-gray-800 mb-4">Damage report classification</h2>
        <canvas id="damageChart" class="flex items-center mb-4 w-full max-w-sm h-24"></canvas>
       
    </div>
</div>


  <!-- Report List -->
  <div class="bg-white p-6 rounded-lg shadow mb-8 mb-8 mt-8 overflow-x-auto">
    <h3 class="text-lg font-bold mb-4">Report List</h3>
    <table class="w-full text-left">
      <thead>
        <tr class="text-gray-600 border-b">
          <th class="py-2">User Name</th>
          <th class="py-2">Location</th>
          <th class="py-2">Date - Time</th>
          <th class="py-2">Description</th>
          <th class="py-2">Status</th>
        </tr>
      </thead>
      <tbody>
        <tr class="border-b hover:bg-gray-100">
          <td class="py-2">Apple Watch</td>
          <td class="py-2">6096 Marjolaine Landing</td>
          <td class="py-2">12.09.2019 - 12.53 PM</td>
          <td class="py-2">Ada kebocoran pipa di perumahan Buana Raya ...</td>
          <td class="py-2"><span class="bg-red-500 text-white px-2 py-1 rounded text-sm">Urgent</span></td>
        </tr>
      </tbody>
    </table>
  </div>
@endsection

@section('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    // Priority Chart
    var priorityCtx = document.getElementById('priorityChart').getContext('2d');
    new Chart(priorityCtx, {
        type: 'doughnut',
        data: {
            labels: ['Urgent', 'Not Urgent'],
            datasets: [{
                data: [65, 127],
                backgroundColor: ['#ef4444', '#10b981']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            }
        }
    });

    // Damage Classification Chart
    var damageCtx = document.getElementById('damageChart').getContext('2d');
    new Chart(damageCtx, {
        type: 'doughnut',
        data: {
            labels: ['Pipa Bocor', 'Air Mati', 'Air Keruh'],
            datasets: [{
                label: 'Jumlah Report',
                data: [65, 50, 28],
                backgroundColor: ['#1e40af', '#3b82f6', '#93c5fd']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
          
        }
    });
});
</script>
@endsection