@extends('layouts.sidebar-operator')

@section('title', 'Laporan')

@section('content')
<div class="p-6">
  <h1 class="text-3xl font-bold mb-6">Laporan</h1>

  <!-- Report List -->
  <div class="bg-white p-6 rounded-lg shadow mb-8 mt-8 overflow-x-auto w-full max-w-screen-xl mx-auto">
    <div class="flex justify-end mb-4">
      <select class="border border-gray-300 rounded px-2 py-1 text-sm">
        @foreach ([
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ] as $month)
          <option>{{ $month }}</option>
        @endforeach
      </select>
    </div>

    <h3 class="flex justify-start text-lg font-bold mb-8">Report List</h3>

    <table class="w-full text-left border-collapse" id="report-table">
      <thead class="px-4 mb-4">
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
        <tr class="border-b hover:bg-gray-100 report-row" data-status="{{ $report->status }}">
          <td class="py-2 px-4">{{ $report->report_id }}</td>
          <td class="py-2 px-4">{{ $report->user_id }}</td>
          <td class="py-2 px-4">{{ $report->title }}</td>
          <td class="py-2 px-4">{{ $report->description }}</td>
          
          <!-- Priority badge -->
          <td class="py-2 px-4">
            @php
              $priorityColor = [
                'low' => 'bg-green-500',
                'medium' => 'bg-yellow-500',
                'high' => 'bg-red-500'
              ][$report->priority];
            @endphp
            <span class="{{ $priorityColor }} text-white text-xs px-3 py-1 rounded-full capitalize">
              {{ $report->priority }}
            </span>
          </td>

          <!-- Status badge -->
          <td class="py-2 px-4">
            @php
              $statusLabels = [
                'pending' => ['label' => 'Pending', 'color' => 'bg-gray-400'],
                'in_progress' => ['label' => 'In Progress', 'color' => 'bg-blue-500'],
                'resolved' => ['label' => 'Resolved', 'color' => 'bg-green-600'],
              ];
              $status = $report->status;
            @endphp
            <span class="{{ $statusLabels[$status]['color'] }} text-white text-xs px-3 py-1 rounded-full capitalize">
              {{ $statusLabels[$status]['label'] }}
            </span>
          </td>

          <!-- Image -->
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

    <!-- Pagination -->
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
