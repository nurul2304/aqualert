@extends('layouts.sidebar-admin')

@section('title', 'Laporan')

@section('content')
<div class="p-6">
  <h1 class="text-3xl font-bold mb-6">Laporan</h1>

  <div class="bg-white p-6 rounded-lg shadow mb-8 mt-8 overflow-x-auto w-full max-w-screen-xl mx-auto">
    <div class="flex justify-end mb-4">
      <form method="GET" action="{{ route('admin.laporan-masuk2') }}" class="inline-block">
        <select name="month" onchange="this.form.submit()" class="border border-gray-300 rounded px-2 py-1 text-sm">
            @foreach ([
                'January', 'February', 'March', 'April', 'May', 'June',
                'July', 'August', 'September', 'October', 'November', 'December'
            ] as $index => $month)
              <option value="{{ $index + 1 }}" {{ request('month') == $index + 1 ? 'selected' : '' }}>
                {{ $month }}
              </option>
            @endforeach
        </select>
  </form>

    </div>

    <h3 class="text-lg font-bold mb-8">Report List</h3>

    <table class="w-full text-left border-collapse" id="report-table">
      <thead>
        <tr class="text-gray-600 border-b text-sm">
          <th class="py-2 px-4">ID</th>
          <th class="py-2 px-4">User ID</th>
          <th class="py-2 px-4">Judul</th>
          <th class="py-2 px-4">Deskripsi</th>
          <th class="py-2 px-4">Prioritas</th>
          <th class="py-2 px-4">Status</th>
          <th class="py-2 px-4">Bukti Foto</th>
          <th class="py-2 px-4">Token</th>
          <th class="py-2 px-4">Created At</th>
        </tr>
      </thead>
      <tbody class="text-sm">
        @foreach ($reports as $report)
        <tr class="border-b hover:bg-gray-100">
          <td class="py-2 px-4">{{ $report->report_id }}</td>
          <td class="py-2 px-4">{{ $report->user_id }}</td>
          <td class="py-2 px-4">{{ $report->title }}</td>
          <td class="py-2 px-4">{{ $report->description }}</td>

          <td class="py-2 px-4">
            @php
              $priorityColor = [
                'low' => 'bg-green-500',
                'medium' => 'bg-yellow-500',
                'high' => 'bg-red-500'
              ][$report->priority] ?? 'bg-gray-300';
            @endphp
            <span class="{{ $priorityColor }} text-white text-xs px-3 py-1 rounded-full capitalize">
              {{ $report->priority }}
            </span>
          </td>

        <td class="py-2">
          <div class="flex items-center gap-2 relative">
            @php
              $statusLabels = [
                'pending' => ['label' => 'Pending', 'color' => 'bg-gray-400'],
                'in_progress' => ['label' => 'In Progress', 'color' => 'bg-blue-500'],
                'resolved' => ['label' => 'Resolved', 'color' => 'bg-green-600'],
              ];
              $status = $report->status;
            @endphp
            
             <!-- Status badge -->
              <span class="{{ $statusLabels[$status]['color'] ?? 'bg-gray-300' }} text-white text-xs px-3 py-1 rounded-full capitalize">
                {{ $statusLabels[$status]['label'] ?? ucfirst($status) }}
              </span>

              <!-- Gear Dropdown -->
              <div class="relative">
                <button onclick="toggleDropdown({{ $report->report_id }})" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                  ⚙️
                </button>
                <!-- Dropdown Box -->
                <div id="dropdown-{{ $report->report_id }}" class="hidden absolute z-10 mt-2 w-32 bg-white border rounded shadow-lg">
                  <form method="POST" action="{{ route('admin.reports.updateStatus', $report->report_id) }}">
                    @csrf
                    @method('PATCH')
                    <select name="status" onchange="this.form.submit()" class="block w-full px-3 py-2 text-sm border-none">
                      <option value="pending" {{ $status == 'pending' ? 'selected' : '' }}>Pending</option>
                      <option value="in_progress" {{ $status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                      <option value="resolved" {{ $status == 'resolved' ? 'selected' : '' }}>Resolved</option>
                    </select>
                  </form>
                </div>
              </div>
            </div>
          </td>

          <td class="py-2 px-4">
            @if ($report->image_path)
              <img src="{{ asset('storage/' . $report->image_path) }}" class="w-12 h-12 object-cover rounded" alt="Image">
            @else
              <span class="text-gray-400 italic">No image</span>
            @endif
          </td>

          <td class="py-2 px-4">{{ $report->report_token }}</td>
          <td class="py-2 px-4">{{ $report->created_at->format('d M Y, H:i') }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <div class="mt-4">
      {{ $reports->links() }}
    </div>
  </div>
</div>

<script>
  function toggleDropdown(id) {
    document.querySelectorAll('[id^="dropdown-"]').forEach(el => {
      if (el.id !== 'dropdown-' + id) el.classList.add('hidden');
    });
    const dropdown = document.getElementById('dropdown-' + id);
    dropdown.classList.toggle('hidden');
  }

  document.addEventListener('click', function(event) {
    if (!event.target.closest('.relative')) {
      document.querySelectorAll('[id^="dropdown-"]').forEach(el => el.classList.add('hidden'));
    }
  });
</script>

@endsection
