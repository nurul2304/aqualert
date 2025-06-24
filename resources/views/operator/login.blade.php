@extends('layouts.guest')

@section('title', 'Login Operator')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 bg-cover bg-center" style="background-image: url('/images/Main Bg.png');">
    <div class="bg-white rounded-xl shadow-lg p-6 sm:p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-6 sm:mb-8">Masuk ke Akun</h2>
        
        <form method="POST" action="#">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium">Email</label>
                <input type="email" name="email" id="email" required
                    class="mt-1 w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Email">
            </div>

            <!-- Password -->
            <div class="mb-4">
                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-1 sm:gap-0">
                    <label for="password" class="text-sm font-medium">Password</label>
                    <a href="#" class="text-sm text-blue-500 hover:underline">Lupa Password?</a>
                </div>
                <input type="password" name="password" id="password" required
                    class="mt-1 w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Password">
            </div>

            <!-- Terms -->
            <div class="mb-6 flex items-start sm:items-center">
                <input type="checkbox" name="terms" id="terms" required class="mr-2 mt-1 sm:mt-0">
                <label for="terms" class="text-sm text-gray-600">Saya menyetujui syarat dan ketentuan</label>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-700 transition">Masuk</button>
        </form>
    </div>
</div>
@endsection
