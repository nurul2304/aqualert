@extends('layouts.sidebar-admin')

@section('title', 'Visual Data')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="container mx-auto px-4 py-6 z-index">
    <h2 class="text-2xl font-bold mb-4">Alat Sensor</h2>

    <!-- Device Buttons -->
    <div class="flex flex-wrap gap-2 mb-6">
        @for ($i = 1; $i <= 5; $i++)
            <button class="bg-gray-200 hover:bg-blue-500 hover:text-white text-gray-700 font-semibold py-2 px-4 rounded transition">
                Device {{ $i }}
            </button>
        @endfor
    </div>

    <!-- Sensor Cards -->
    <!-- Sensor Dashboard Cards with Realtime Chart -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mb-8">
  <!-- Sensor pH -->
  <div class="bg-white shadow rounded-lg p-4">
    <div class="text-gray-600">Sensor pH</div>
    <div class="text-lg font-bold mb-2">7.1</div>
    <canvas id="phChart"></canvas>
  </div>

  <!-- Sensor TDS -->
  <div class="bg-white shadow rounded-lg p-4">
    <div class="text-gray-600">Sensor TDS</div>
    <div class="text-lg font-bold mb-2">320 ppm</div>
    <canvas id="tdsChart"></canvas>
  </div>

  <!-- Sensor Kekeruhan -->
  <div class="bg-white shadow rounded-lg p-4">
    <div class="text-gray-600">Sensor Kekeruhan</div>
    <div class="text-lg font-bold mb-2">15 NTU</div>
    <canvas id="kekeruhanChart"></canvas>
  </div>

  <!-- Sensor Ketinggian Air -->
  <div class="bg-white shadow rounded-lg p-4">
    <div class="text-gray-600">Sensor Ketinggian Air</div>
    <div class="text-lg font-bold mb-2">1.25 m</div>
    <canvas id="ketinggianChart"></canvas>
  </div>
</div>

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Realtime Sensor Charts Script -->
<script>
  const labels = Array.from({ length: 10 }, (_, i) => `${i * 5}s`);

  function createLineChart(ctx, label, data, color) {
    return new Chart(ctx, {
      type: 'line',
      data: {
        labels,
        datasets: [{
          label,
          data,
          borderColor: color,
          backgroundColor: color + '33',
          tension: 0.3,
          fill: true
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: true,
        scales: {
          y: { beginAtZero: true }
        }
      }
    });
  }

//   Sensor HCR
  function createBarChart(ctx, label, data, color) {
    return new Chart(ctx, {
      type: 'bar',
      data: {
        labels,
        datasets: [{
          label,
          data,
          backgroundColor: color + 'AA'
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: true,
        scales: {
          y: { beginAtZero: true }
        }
      }
    });
  }

  // Sample dummy data
  const dummyData = () => Array.from({ length: 10 }, () => (Math.random() * 10 + 1).toFixed(2));
  const dummyTDS = () => Array.from({ length: 10 }, () => Math.floor(Math.random() * 500));
  const dummyTurb = () => Array.from({ length: 10 }, () => Math.floor(Math.random() * 30));
  const dummyWater = () => Array.from({ length: 10 }, () => (Math.random() * 2).toFixed(2));

  const phChart = createLineChart(document.getElementById('phChart'), 'pH', dummyData(), '#3B82F6');
  const tdsChart = createLineChart(document.getElementById('tdsChart'), 'TDS (ppm)', dummyTDS(), '#10B981');
  const kekeruhanChart = createLineChart(document.getElementById('kekeruhanChart'), 'NTU', dummyTurb(), '#F59E0B');
  const ketinggianChart = createBarChart(document.getElementById('ketinggianChart'), 'Meter', dummyWater(), '#EF4444');

  // Optional: simulate realtime data update
  setInterval(() => {
    const updateChart = (chart, newVal) => {
      chart.data.datasets[0].data.shift();
      chart.data.datasets[0].data.push(newVal);
      chart.update();
    };

    updateChart(phChart, (Math.random() * 10 + 1).toFixed(2));
    updateChart(tdsChart, Math.floor(Math.random() * 500));
    updateChart(kekeruhanChart, Math.floor(Math.random() * 30));
    updateChart(ketinggianChart, (Math.random() * 2).toFixed(2));
  }, 3000);
</script>


    <!-- Sensor Location (Leaflet Map) -->
    <div class="bg-white shadow rounded-lg p-4 mb-6">
        <h3 class="text-lg font-bold mb-2">Sensor Location</h3>
        <div id="map" class="w-full h-64 rounded"></div>
    </div>

    <!-- Sensor Details Table -->
    <div class="bg-white shadow rounded-lg p-4 relative">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-bold">Sensor Details</h3>
            <div class="flex items-center gap-2">
                <!-- Tombol Ekspor ke kiri -->
                <button id="openExportModal" class="bg-blue-500 hover:bg-blue-600 text-white text-sm px-4 py-2 rounded">
                   <i class="fa-solid fa-cloud-arrow-down"></i>
                </button>
                <select class="border border-gray-300 rounded px-2 py-1 text-sm">
                    @foreach ([
                        'January', 'February', 'March', 'April', 'May', 'June',
                        'July', 'August', 'September', 'October', 'November', 'December'
                    ] as $month)
                        <option>{{ $month }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-left border-collapse">
                <thead>
                    <tr class="text-gray-700 border-b">
                        <th class="p-2">Device Name</th>
                        <th class="p-2">Location</th>
                        <th class="p-2">Date - Time</th>
                        <th class="p-2">Turbidity</th>
                        <th class="p-2">TDS</th>
                        <th class="p-2">pH</th>
                        <th class="p-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 3; $i++)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="p-2 flex items-center gap-2"><span>⌚</span> Apple Watch</td>
                        <td class="p-2">N 1° 8' 45.0744", E 104° ...</td>
                        <td class="p-2">12.09.2019 - 12:53 PM</td>
                        <td class="p-2">20 NTU</td>
                        <td class="p-2">230</td>
                        <td class="p-2">pH 6.5</td>
                        <td class="p-2"><span class="bg-green-500 text-white text-xs px-2 py-1 rounded">Good</span></td>
                    </tr>
                    @endfor
                </tbody>
            </table>
        </div>

        <!-- Navigasi dengan Panah -->
        <div class="mt-4 flex justify-center items-center gap-1 text-sm">
            <button class="px-3 py-1 rounded border bg-white text-gray-700 hover:bg-gray-200">←</button>
            @for ($i = 1; $i <= 6; $i++)
                <button class="px-3 py-1 rounded border {{ $i === 1 ? 'bg-blue-500 text-white' : 'bg-white text-gray-700 hover:bg-gray-200' }}">
                    {{ $i }}
                </button>
            @endfor
            <button class="px-3 py-1 rounded border bg-white text-gray-700 hover:bg-gray-200">→</button>
        </div>

        <!-- Export Modal (dipindah dekat tombol) -->
        <div id="exportModal" class="absolute top-12 left-0 z-50 bg-white border border-gray-300 rounded shadow-lg w-80 p-6 hidden">
            <h3 class="text-lg font-semibold mb-4">Pengaturan Ekspor Data</h3>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Format Ekspor</label>
                <select class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
                    <option value="pdf">PDF</option>
                    <option value="excel">Excel</option>
                    <option value="csv">CSV</option>
                </select>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">Rentang Bulan</label>
                <select class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
                    @foreach ([
                        'January', 'February', 'March', 'April', 'May', 'June',
                        'July', 'August', 'September', 'October', 'November', 'December'
                    ] as $month)
                        <option>{{ $month }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end space-x-2">
                <button id="closeExportModal" class="px-4 py-2 text-sm bg-gray-200 rounded hover:bg-gray-300">Batal</button>
                <button class="px-4 py-2 text-sm bg-blue-500 text-white rounded hover:bg-blue-600">Ekspor</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<!-- Leaflet CSS & JS -->
<div id="map" class="relative z-0 h-64 rounded-lg"></div>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Map init
        var map = L.map('map').setView([1.0964, 104.0406], 12);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);
        L.marker([1.0964, 104.0406]).addTo(map)
            .bindPopup('Lokasi Sensor')
            .openPopup();

        // Modal logic
        const openBtn = document.getElementById('openExportModal');
        const modal = document.getElementById('exportModal');
        const closeBtn = document.getElementById('closeExportModal');

        openBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            modal.classList.toggle('hidden');
        });

        closeBtn.addEventListener('click', () => modal.classList.add('hidden'));

        // Tutup modal jika klik di luar
        document.addEventListener('click', (e) => {
            if (!modal.contains(e.target) && !openBtn.contains(e.target)) {
                modal.classList.add('hidden');
            }
        });
    });
</script>

@endsection
