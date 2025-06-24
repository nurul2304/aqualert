<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserLog;
use Illuminate\Support\Facades\Hash;

class OperatorAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('operator.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)
                    ->where('status', 'active')
                    ->first();

        if (!$user || !Hash::check($request->password, $user->password_hash)) {
            return back()->withErrors(['login_error' => 'Username atau password salah']);
        }

        Auth::login($user);

        // Redirect berdasarkan role
        return match($user->role) {
            'operator' => redirect()->route('operator.dashboard'),
            'operator' => redirect()->route('operator.manage-user'),
            'operator' => redirect()->route('operator.dashboard'),
            default => abort(403),
        };

        UserLog::create([
        'user_id' => $user->user_id,
        'action' => 'login',
        'module_name' => 'auth',
]);
    }
    

    public function logout(Request $request)
    {
        UserLog::create([
        'user_id' => auth()->user()->user_id,
        'action' => 'logout',
        'module_name' => 'auth',
    ]);

        Auth::logout();
        return redirect('/login');
    }

}
