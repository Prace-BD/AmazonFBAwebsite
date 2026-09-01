<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    /**
     * Show the Admin Login Form
     */
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('admin.theme-control');
        }

        return view('admin.login');
    }

    /**
     * Handle Admin Login
     */
    public function login(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
        ]);

        $password = $request->input('password');
        $email = $request->input('email', 'admin@oyllegacy.com');

        // Check if an admin user exists
        $user = User::where('email', $email)->first() ?? User::first();

        if (!$user) {
            // Create default admin user if none exists
            $user = User::create([
                'name' => 'OYL Legacy Administrator',
                'email' => 'admin@oyllegacy.com',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ]);
        }

        // Verify password against database hash
        if (Hash::check($password, $user->password)) {
            Auth::login($user, $request->boolean('remember', true));
            $request->session()->regenerate();
            return redirect()->intended(route('admin.theme-control'))->with('success', 'Welcome back, Administrator! You are now logged in.');
        }

        return back()->withInput()->with('error', 'Invalid password. Please check your credentials.');
    }

    /**
     * Update Admin Password in Database
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->input('current_password'), $user->password)) {
            return back()->with('error', 'Current password does not match.');
        }

        $user->update([
            'password' => Hash::make($request->input('new_password')),
        ]);

        return back()->with('success', 'Admin password updated in the database successfully!');
    }

    /**
     * Log the Admin Out
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'You have been logged out securely.');
    }
}
