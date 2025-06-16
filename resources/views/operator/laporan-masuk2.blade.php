@extends('layouts.sidebar-operator')

@section('title', 'Laporan')

@section('content')
<div class="p-6">
  <h1 class="text-3xl font-bold mb-6">Laporan</h1>

  <!-- Status Filter Buttons -->
  <div class="flex space-x-4 mb-6">
    <button data-filter="todo" class="filter-btn bg-blue-600 text-white px-4 py-2 rounded-md shadow">To Do</button>
    <button data-filter="inprogress" class="filter-btn bg-gray-100 text-black px-4 py-2 rounded-md shadow border">In Progress</button>
    <button data-filter="done" class="filter-btn bg-gray-100 text-dark px-4 py-2 rounded-md shadow border">Done</button>
  </div>

  <!-- Report List -->
  <div class="bg-white p-6 rounded-lg shadow mb-8 mt-8 overflow-x-auto">
    <div class="flex justify-end">
      <select class="border border-gray-300 rounded px-2 py-1 text-sm">
        @foreach ([
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ] as $month)
          <option>{{ $month }}</option>
        @endforeach
      </select>
    </div>

    <h3 class="text-lg font-bold mb-4">Report List</h3>
    
    <table class="w-full text-between" id="report-table">
      <thead>
        <tr class="text-gray-600 border-b">
          <th class="py-2">User Name</th>
          <th class="py-2">Location</th>
          <th class="py-2">Date - Time</th>
          <th class="py-2">Description</th>
          <th class="py-2">Tingkat Urgensi</th>
          <th class="py-2">Status</th>
        </tr>
      </thead>
      <tbody>
        @php
          $reports = [
            ['name' => 'Apple Watch', 'loc' => 'Buana Raya', 'time' => '2023-06-10 09:30 AM', 'desc' => 'Kebocoran pipa utama', 'status' => 'todo'],
            ['name' => 'John Doe', 'loc' => 'Jalan Kenanga', 'time' => '2023-06-11 11:20 AM', 'desc' => 'Sampah menumpuk di got', 'status' => 'inprogress'],
            ['name' => 'Sari Putri', 'loc' => 'Taman Sari', 'time' => '2023-06-12 08:45 AM', 'desc' => 'Pohon tumbang menghalangi jalan', 'status' => 'done'],
          ];
        @endphp

        @foreach ($reports as $report)
          <tr class="border-b hover:bg-gray-100 report-row" data-status="{{ $report['status'] }}">
            <td class="py-2">{{ $report['name'] }}</td>
            <td class="py-2">{{ $report['loc'] }}</td>
            <td class="py-2">{{ $report['time'] }}</td>
            <td class="py-2">{{ $report['desc'] }}</td>
            <td class="py-2">
              @if ($report['status'] === 'todo')
                <span class="bg-red-500 text-white text-xs px-3 py-1 rounded-full">Urgent</span>
              @elseif ($report['status'] === 'inprogress')
                <span class="bg-green-500 text-white text-xs px-3 py-1 rounded-full">Not Urgent</span>
                @elseif ($report['status'] === 'done')
                <span class="bg-green-500 text-white text-xs px-3 py-1 rounded-full">Not Urgent</span>
              @endif
            </td>
            <!-- Aksi -->
            <td class="py-2">
              <div class="relative inline-block text-left">
      <select
        onchange="this.closest('tr').dataset.status = this.value;"
        class="block w-full appearance-none bg-white border border-gray-300 text-gray-700 py-1.5 pl-3 pr-8 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400 text-sm font-medium transition"
      >
        <option value="todo" class="text-red-600 font-semibold">🔴 To Do</option>
        <option value="inprogress" class="text-yellow-700 font-semibold">🟡 In Progress</option>
        <option value="done" class="text-green-700 font-semibold">🟢 Done</option>
      </select>
      <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
          <path d="M7 7l3-3 3 3m0 6l-3 3-3-3" />
        </svg>
      </div>
    </div>
  </td>
</tr>
@endforeach
      </tbody>
    </table>

    <div class="mt-4 flex justify-center items-center gap-1 text-sm">
      <button class="px-3 py-1 rounded border bg-white text-gray-700 hover:bg-gray-200">←</button>
      @for ($i = 1; $i <= 3; $i++)
        <button class="px-3 py-1 rounded border {{ $i === 1 ? 'bg-blue-500 text-white' : 'bg-white text-gray-700 hover:bg-gray-200' }}">
          {{ $i }}
        </button>
      @endfor
      <button class="px-3 py-1 rounded border bg-white text-gray-700 hover:bg-gray-200">→</button>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script>
  const filterButtons = document.querySelectorAll('.filter-btn');
  const rows = document.querySelectorAll('.report-row');

  filterButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      const status = btn.dataset.filter;
      
      // Update active button style
      filterButtons.forEach(b => b.classList.remove('bg-blue-600', 'text-white'));
      btn.classList.add('bg-blue-600', 'text-white');

      rows.forEach(row => {
        row.style.display = row.dataset.status === status ? '' : 'none';
      });
    });
  });
</script>
@endsection
