<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
     public function laporanMasuk2()
    {
        return view('admin.laporan-masuk2');
    }
    public function visualData()
    {
    return view('admin.visualdata');
    }
    public function notifikasi()
    {
        return view('admin.notifikasi');
    }
    
    // Manage User
    public function manageUser()
    {
    $users = User::where('role', 'operator')->get()->map(function ($user) {
        $lastAction = DB::table('user_logs')
            ->where('user_id', $user->user_id)
            ->orderByDesc('timestamp')
            ->value('action');

        $user->online = $lastAction === 'login';
        return $user;
    });

    return view('admin.manage-user', compact('users'));
}

    public function store(Request $request)
    {
    $request->validate([
        'username' => 'required|unique:users',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        'status' => 'required|in:active,inactive',
    ]);

    $password = $request->password ?? 'default123';

    User::create([
        'username' => $request->username,
        'email' => $request->email,
        'full_name' => $request->full_name,
        $password = $request->password ?? 'default123',
        'password_hash' => Hash::make($password),
        'role' => 'operator',
        'status' => $request->status,
    ]);

    return redirect()->route('admin.manage-user')->with('success', 'Operator berhasil ditambahkan');
}

    public function update(Request $request, $id)
    {
    $user = User::findOrFail($id);

    $request->validate([
        'full_name' => 'required|string|max:100',
        'username' => 'required|string|max:100',
        'email' => 'required|email|unique:users,email,' . $user->user_id . ',user_id',
        'status' => 'required|in:active,inactive',
    ]);

    $user->update([
        'full_name' => $request->full_name,
        'username' => $request->username,
        'email' => $request->email,
        'status' => $request->status,
    ]);

    return redirect()->back()->with('success', 'Operator diperbarui');
}

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'User berhasil dihapus');
    }
}