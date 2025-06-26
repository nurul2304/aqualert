@extends('layouts.guest')
@section('title', 'Laporan Terkirim')

@section('content')
<div class="flex flex-col items-center justify-center min-h-screen p-6">
  <h1 class="text-2xl font-bold text-green-600 mb-4">Laporan Berhasil Dikirim!</h1>
  <p class="mb-2">Simpan token berikut untuk melacak laporan Anda:</p>
  <div class="bg-gray-100 px-6 py-4 rounded-lg text-center text-xl font-mono font-semibold tracking-widest">
    {{ $token }}
  </div>

  <button onclick="navigator.clipboard.writeText('{{ $token }}')" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
    Salin Token
  </button>
  <a href="{{ route('public.report-list') }}"
   class="mt-6 inline-block text-sm text-gray-600 hover:text-blue-700 underline">
  ❌ Kembali ke Daftar Laporan
  </a>

</div>
@endsection
