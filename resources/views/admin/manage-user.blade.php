@extends('layouts.sidebar-admin')

@section('title', 'Manage User')

@section('content')
<div class="p-6 bg-gray-100 min-h-screen w-full">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold">User Management</h1>
        </div>

    <!-- Search & Add Button -->
<div class="mb-8 flex justify-between items-center">
    <input type="text" placeholder="Search" class="w-64 px-4 py-2 rounded-lg border border-blue-300">
    <button onclick="openModal()" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
        + Add New User
    </button>
</div>

<!-- Modal -->
<div id="userModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
    <div class="bg-white rounded-lg p-6 w-full max-w-md shadow-lg">
        <h2 class="text-xl font-bold mb-4">Add New User</h2>
        <form action="#" method="POST">
            <div class="mb-4">
                <label class="block text-sm font-medium">Name</label>
                <input type="text" name="name" class="w-full px-3 py-2 border rounded-md">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Email</label>
                <input type="email" name="email" class="w-full px-3 py-2 border rounded-md">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Password</label>
                <input type="password" name="password" class="w-full px-3 py-2 border rounded-md">
            </div>
            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-300 rounded-md">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Save</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Script -->
<script>
    function openModal() {
        document.getElementById('userModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('userModal').classList.add('hidden');
    }
</script>


    <div class="bg-white shadow rounded-lg overflow-x-auto">
        <table class="w-full text-center table-auto min-w-[600px]">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-4">Name</th>
                    <th class="p-4">Email</th>
                    <th class="p-4">Status</th>
                    <th class="p-4">Operation</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b">
                    <td class="p-4">Example Name</td>
                    <td class="p-4">example@email.com</td>
                    <td class="p-4">
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded text-sm">Active</span>
                    </td>
                    <td class="p-4 ms-5">
                        <div class="flex flex-col md:flex-row md:items-left gap-2 justify-center">
                        <a href="#" class="text-blue-600 hover:underline mr-2 flex items-center gap-1">
                            <i class="fa-solid fa-pen-to-square"></i>
                            <span class="hidden md:inline">Edit</span>
                        </a>
                        <a href="#" class="text-red-600 hover:underline flex items-center gap-1">
                            <i class="fa-solid fa-trash"></i>
                            <span class="hidden md:inline">Hapus</span>
                        </a>
                    </td>
                </div>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
