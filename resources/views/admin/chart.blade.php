@extends('layouts.sidebar-admin')

@section('title', 'Payment Chart')

@section('content')
<div class="p-6 bg-gray-100 min-h-screen">
    <!-- Section 1: Payment Chart -->
    <div class="bg-white rounded-2xl shadow-md p-6 mb-10">
        <div class="flex justify-between items-center mb-4">
            <div>
                <p class="text-sm text-gray-400 font-medium">Statistics</p>
                <h2 class="text-xl font-bold text-gray-800">Payment received.</h2>
            </div>
            <div class="flex gap-2 bg-gray-100 p-1 rounded-full">
                <button class="px-3 py-1 text-sm rounded-full hover:bg-white">Day</button>
                <button class="px-3 py-1 text-sm rounded-full hover:bg-white">Week</button>
                <button class="px-3 py-1 text-sm rounded-full bg-white text-black font-semibold shadow">Month</button>
                <button class="px-3 py-1 text-sm rounded-full hover:bg-white">Year</button>
            </div>
        </div>

        <div class="flex items-center gap-4 mb-4">
            <div class="flex items-center gap-2">
                <span class="h-2 w-2 rounded-full bg-indigo-600"></span>
                <span class="text-sm text-gray-600">Wire transfer</span>
            </div>
            <div class="flex items-center gap-2">
                <span class="h-2 w-2 rounded-full bg-purple-300"></span>
                <span class="text-sm text-gray-600">Mobile payment</span>
            </div>
        </div>

        <canvas id="paymentChart" height="100"></canvas>
    </div>

    <!-- Section 2: Other Charts -->
    <h1 class="text-2xl font-bold mb-6">Other Charts</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Bar Chart -->
        <div class="bg-white p-4 rounded-xl shadow">
            <h2 class="text-lg font-semibold mb-2">Bar Chart</h2>
            <canvas id="barChart"></canvas>
        </div>

        <!-- Line Chart -->
        <div class="bg-white p-4 rounded-xl shadow">
            <h2 class="text-lg font-semibold mb-2">Line Chart</h2>
            <canvas id="lineChart"></canvas>
        </div>

        <!-- Pie Chart -->
        <div class="bg-white p-4 rounded-xl shadow">
            <h2 class="text-lg font-semibold mb-2">Pie Chart</h2>
            <canvas id="pieChart"></canvas>
        </div>

        <!-- Doughnut Chart -->
        <div class="bg-white p-4 rounded-xl shadow">
            <h2 class="text-lg font-semibold mb-2">Doughnut Chart</h2>
            <canvas id="doughnutChart"></canvas>
        </div>
    </div>
</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Chart Scripts -->
<script>
    // Payment Line Chart
    const ctx = document.getElementById('paymentChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['1 Oct', '3 Oct', '7 Oct', '10 Oct', '14 Oct', '20 Oct', '23 Oct', '27 Oct', '30 Oct'],
            datasets: [
                {
                    label: 'Wire transfer',
                    data: [1800, 2600, 2000, 2700, 3500, 1700, 700, 1500, 3200],
                    borderColor: '#4f46e5',
                    backgroundColor: '#4f46e5',
                    tension: 0.4,
                    pointRadius: 5,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#4f46e5',
                    borderWidth: 2
                },
                {
                    label: 'Mobile payment',
                    data: [300, 1100, 1300, 600, 2700, 3100, 2300, 2800, 1400],
                    borderColor: '#d8b4fe',
                    backgroundColor: '#d8b4fe',
                    tension: 0.4,
                    pointRadius: 5,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#d8b4fe',
                    borderWidth: 2
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                tooltip: {
                    callbacks: {
                        label: context => `$${context.parsed.y.toLocaleString()}`
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: value => value === 0 ? '0' : `${value / 1000}k`
                    },
                    grid: { color: '#e5e7eb' }
                },
                x: {
                    grid: { display: false }
                }
            }
        }
    });

    // Bar Chart
    new Chart(document.getElementById('barChart'), {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr'],
            datasets: [{
                label: 'Sales',
                data: [65, 59, 80, 81],
                backgroundColor: '#3b82f6'
            }]
        }
    });

    // Line Chart
    new Chart(document.getElementById('lineChart'), {
        type: 'line',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu'],
            datasets: [{
                label: 'Visitors',
                data: [12, 19, 3, 5],
                borderColor: '#10b981',
                backgroundColor: '#10b98122',
                fill: true
            }]
        }
    });

    // Pie Chart
    new Chart(document.getElementById('pieChart'), {
        type: 'pie',
        data: {
            labels: ['Red', 'Blue', 'Yellow'],
            datasets: [{
                data: [10, 20, 30],
                backgroundColor: ['#ef4444', '#3b82f6', '#facc15']
            }]
        }
    });

    // Doughnut Chart
    new Chart(document.getElementById('doughnutChart'), {
        type: 'doughnut',
        data: {
            labels: ['A', 'B', 'C'],
            datasets: [{
                data: [40, 30, 30],
                backgroundColor: ['#8b5cf6', '#10b981', '#f97316']
            }]
        }
    });
</script>
@endsection
