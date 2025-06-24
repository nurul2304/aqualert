@extends('layouts.sidebar-operator')

@section('title', 'Dashboard')

@section('content')
  <h1 class="text-3xl font-bold mb-6 mt-6">Dashboard</h1>

 <div class="grid grid-cols-2 gap-6 mb-8 overflow-x-auto">
  <div class="relative bg-white p-6 rounded-lg shadow overflow-x-auto">
    <img src="{{ asset('images/total_report.png') }}" alt="icon" class="absolute top-4 right-4 w-12 h-12">
    <p class="text-gray-600">Total Report</p>
    <h2 class="text-2xl font-bold">197</h2>
    </div>

  <div class="relative bg-white p-6 rounded-lg shadow overflow-x-auto">
    <img src="{{ asset('images/water_quality.png') }}" alt="icon" class="absolute top-4 right-4 w-12 h-12">
    <p class="text-gray-600">Water Quality</p>
    <h2 class="text-xl font-bold">Baik</h2>
    </div>
</div>


  <!-- Sensor Location (Leaflet Map) -->
<div class="bg-white shadow rounded-lg p-4 mb-6">
    <h3 class="text-lg font-bold mb-2">Sensor Location</h3>
    <div id="map" class="relative z-0 h-64 rounded-lg shadow"></div>
</div>


  <!-- Sensor Details -->
  <div class="bg-white p-6 rounded-lg shadow overflow-x-auto">
    <h3 class="text-lg font-bold mb-4">Sensor Details</h3>
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
