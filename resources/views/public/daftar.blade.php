@extends('layouts.guest')

@section('title', 'Daftar')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-cover bg-center" style="background-image: url('/images/Main Bg.png');">
    <div class="bg-white rounded-xl shadow-lg p-8 rounded-lg w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-8">Create an Account</h2>
        
        <form method="POST" action="{{ route('public.daftar') }}">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium">Email</label>
                <input type="email" name="email" id="email" required class="mt-1 w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Email">
            </div>

            <!-- Username -->
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium">Username</label>
                <input type="text" name="username" id="username" required class="mt-1 w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Username">
            </div>

            <!-- Password -->
            <div class="mb-4">
                <div class="flex justify-between items-center">
                    <label for="password" class="block text-sm font-medium">Password</label>
                    <a href="#" class="text-sm text-blue-500 hover:underline">Forget Password?</a>
                </div>
                <input type="password" name="password" id="password" required class="mt-1 w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Password">
            </div>

            <!-- Terms -->
            <div class="mb-6 flex items-center">
                <input type="checkbox" name="terms" id="terms" required class="mr-2">
                <label for="terms" class="text-sm text-gray-600">I accept terms and conditions</label>
            </div>

            <!-- Sign Up Button -->
             <a href="#">
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-700 transition">Sign Up</button>
            </a>
        </form>

        <!-- Already have an account -->
        <p class="mt-6 text-center text-sm text-gray-600">
            Already have an account? 
            <a href="#" class="text-blue-500 hover:underline">Login</a>
        </p>
    </div>
</div>
@endsection
