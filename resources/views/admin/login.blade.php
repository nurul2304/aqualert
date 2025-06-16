@extends('layouts.guest')

@section('title', 'Login Admin')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-cover bg-center" style="background-image: url('/images/Main Bg.png');">
    <div class="bg-white rounded-xl shadow-lg p-8 rounded-lg w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-8">Masuk ke Akun</h2>
        
        <form method="POST" action="{{ route('admin.dashboard') }}">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium">Email</label>
                <input type="email" name="email" id="email" required class="mt-1 w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Email">
            </div>

            <!-- Password -->
            <div class="mb-4">
                <div class="flex justify-between items-center">
                    <label for="password" class="block text-sm font-medium">Password</label>
                    <a href="#" class="text-sm text-blue-500 hover:underline">Lupa Password?</a>
                </div>
                <input type="password" name="password" id="password" required class="mt-1 w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Password">
            </div>

            <!-- Terms -->
            <div class="mb-6 flex items-center">
                <input type="checkbox" name="terms" id="terms" required class="mr-2">
                <label for="terms" class="text-sm text-gray-600">Ingat Password</label>
            </div>

            <!-- Sign In Button -->
             <a href="admin/dashboard">
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-700 transition">Masuk</button>
            </a>
        </form>
    </div>
</div>
@endsection
