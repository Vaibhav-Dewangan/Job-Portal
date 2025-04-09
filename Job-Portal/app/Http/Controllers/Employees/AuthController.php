<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showSignIn()
    {
        return view('employees.auth.signin');
    }

    public function showSignUp()
    {
        return view('employees.auth.signup');
    }

    // Store User Info
    public function store(Request $request)
    {

        $request->validate([
            'full_name' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'user_type' => 'required|string',
            'password' => 'required|min:6|confirmed'

        ]);

        // create user
        User::create([
            'name' => $request->full_name,
            'email' => $request->email,
            'user_type' => $request->user_type,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Account created successfully!');
    }

    // Login User
    public function signInUser(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'

        ]);

        if (Auth::guard('web')->attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->route('home')->with('success', 'Logged in successfully');
        }

        return back()->with('error', 'Invalid password');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Logout successfully');
    }

    // Reset Password
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Email not found.');
        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('login')->with('success', 'Password has been reset successfully.');
    }

     // Delete Account 
     public function userDelete()
     {
 
         $userId = Auth::guard('web')->user()->id;
         $user = User::findOrFail($userId);
 
         Auth::guard('web')->logout();
 
         $user->delete();
 
         return redirect()->route('home')->with('success', 'Deleted successfully!');
     }
}
