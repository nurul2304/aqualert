@extends('layouts.sidebar-operator')

@section('title', 'Profil Saya')

@section('content')
<div class="bg-white shadow-lg rounded-lg p-6 max-w-3xl mx-auto">
    <h1 class="text-3xl font-bold mb-4 text-center">Profil Pengguna</h1>
    
    <!-- Informasi User -->
    <div class="flex flex-col items-center">
        <img src="{{ asset('images/user-avatar.png') }}" alt="Avatar" class="w-24 h-24 rounded-full shadow mb-4">
        <h2 class="text-2xl font-semibold">{{ Auth::user()->name }}</h2>
        <p class="text-gray-600">{{ Auth::user()->email }}</p>
    </div>

    <!-- Informasi Detail -->
    <div class="mt-6">
        <table class="min-w-full text-left border-collapse bg-gray-100 rounded-lg shadow">
            <tr class="border-b">
                <th class="py-2 px-4">Nama Lengkap:</th>
                <td class="py-2 px-4">{{ Auth::user()->name }}</td>
            </tr>
            <tr class="border-b">
                <th class="py-2 px-4">Email:</th>
                <td class="py-2 px-4">{{ Auth::user()->email }}</td>
            </tr>
            <tr class="border-b">
                <th class="py-2 px-4">Tanggal Bergabung:</th>
                <td class="py-2 px-4">{{ Auth::user()->created_at->format('d M Y') }}</td>
            </tr>
        </table>
    </div>

    <!-- Tombol Aksi -->
    <div class="mt-6 flex justify-center gap-4">
        <a href="{{ route('edit-profile') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Edit Profil</a>
        <a href="{{ route('logout') }}" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">Logout</a>
    </div>
</div>
@endsection
