@extends('layouts.sidebar-admin')

@section('title', 'Manage User')

@section('content')
<div class="p-6 bg-gray-100 min-h-screen w-full">

    {{-- Alert --}}
    @if (session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold">User Management</h1>
    </div>

    <!-- Search & Add -->
    <div class="mb-8 flex flex-col sm:flex-row gap-3 sm:gap-4 sm:justify-between sm:items-center">
        <input type="text" placeholder="Search"
            class="w-full sm:w-64 px-4 py-2 rounded-lg border border-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-400" />
        <button onclick="openModal()"
            class="w-full sm:w-auto bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
            + Add New User
        </button>
    </div>

    <!-- Modal Tambah Operator -->
    <div id="userModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
        <div class="bg-white rounded-lg p-6 w-full max-w-md shadow-lg">
            <h2 class="text-xl font-bold mb-4">Add New Operator</h2>
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium">Full Name</label>
                    <input type="text" name="full_name" class="w-full px-3 py-2 border rounded-md">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium">Username</label>
                    <input type="text" name="username" class="w-full px-3 py-2 border rounded-md" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium">Email</label>
                    <input type="email" name="email" class="w-full px-3 py-2 border rounded-md" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium">Password</label>
                    <input type="password" name="password" class="w-full px-3 py-2 border rounded-md" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium">Status</label>
                    <select name="status" class="w-full px-3 py-2 border rounded-md" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="active">Aktif</option>
                        <option value="inactive">Tidak Aktif</option>
                    </select>
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-300 rounded-md">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit User -->
<div id="editUserModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
    <div class="bg-white rounded-lg p-6 w-full max-w-md shadow-lg">
        <h2 class="text-xl font-bold mb-4">Edit Operator</h2>
        <form id="editUserForm" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="user_id" id="edit-user-id">
            <div class="mb-4">
                <label class="block text-sm font-medium">Full Name</label>
                <input type="text" name="full_name" id="edit-full-name" class="w-full px-3 py-2 border rounded-md" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Username</label>
                <input type="text" name="username" id="edit-username" class="w-full px-3 py-2 border rounded-md" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Email</label>
                <input type="email" name="email" id="edit-email" class="w-full px-3 py-2 border rounded-md" required>
            </div>
            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeEditModal()" class="px-4 py-2 bg-gray-300 rounded-md">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Update</button>
            </div>
        </form>
    </div>
</div>


    {{-- Script --}}
    <script>
        function openModal() {
            document.getElementById('userModal').classList.remove('hidden');
        }
        function closeModal() {
            document.getElementById('userModal').classList.add('hidden');
        }
  
        function openEditModal(el) {
        document.getElementById('edit-user-id').value = el.dataset.id;
        document.getElementById('edit-full-name').value = el.dataset.fullname || '';
        document.getElementById('edit-username').value = el.dataset.username;
        document.getElementById('edit-email').value = el.dataset.email;

        const modal = document.getElementById('editUserModal');
        const form = document.getElementById('editUserForm');
        form.action = `/admin/manage-user/${el.dataset.id}`;

        document.getElementById('editUserModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editUserModal').classList.add('hidden');
    }
</script>


    {{-- Tabel User --}}
    <div class="bg-white shadow rounded-lg overflow-x-auto">
        <table class="w-full table-auto min-w-[600px] text-center">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-4">Username</th>
                    <th class="p-4">Email</th>
                    <th class="p-4">Full Name</th>
                    <th class="p-4">Status</th>
                    <th class="p-4">Operation</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr class="border-b">
                        <td class="p-4">{{ $user->username }}</td>
                        <td class="p-4">{{ $user->email }}</td>
                        <td class="p-4">{{ $user->full_name }}</td>
                        <td class="p-4">
                            @php
                                $isOnline = $user->last_activity && \Carbon\Carbon::parse($user->last_activity)->gt(now()->subMinutes(3));
                            @endphp
                            <span class="{{ $user->is_online ? 'text-green-600' : 'text-gray-500' }}">
                            {{ $user->is_online ? 'Aktif' : 'Offline' }}
                        </span>

                        </td>
                        <td class="p-4">
                            <div class="flex justify-center gap-3">
                                <a href="#"
                                    onclick="openEditModal(this)"
                                    data-id="{{ $user->user_id }}"
                                    data-username="{{ $user->username }}"
                                    data-email="{{ $user->email }}"
                                    data-status="{{ $user->status }}"
                                    data-fullname="{{ $user->full_name }}"
                                    class="text-blue-600 hover:underline flex items-center gap-1">
                                    <i class="fa-solid fa-pen-to-square"></i><span class="hidden md:inline">Edit</span>
                                    </a>

                                <form action="{{ route('admin.users.destroy', $user->user_id) }}" method="POST" onsubmit="return confirm('Hapus user ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline flex items-center gap-1">
                                        <i class="fa-solid fa-trash"></i><span class="hidden md:inline">Hapus</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="p-4 text-gray-500">Belum ada operator</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
