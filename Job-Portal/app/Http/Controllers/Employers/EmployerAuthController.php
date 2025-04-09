<?php

namespace App\Http\Controllers\Employers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Employer;

class EmployerAuthController extends Controller
{
    public function showSignIn()
    {
        return view('employers.auth.signin');
    }

    public function showSignUp()
    {
        return view('employers.auth.signup');
    }

    // Store User Info
    public function store(Request $request)
    {

        $request->validate([
            'company_name' => 'required|string|max:50',
            'email' => 'required|email|unique:employers,email',
            'user_type' => 'required|string',
            'company_address' => 'required|string|max:60',
            'full_name' => 'required|string|max:50',
            'industry_sector' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        // create user
        Employer::create([
            'company_name' => $request->company_name,
            'name' => $request->full_name,
            'email' => $request->email,
            'user_type' => $request->user_type,
            'company_address' => $request->company_address,
            'industry_sector' => $request->industry_sector,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('employer.login')->with('success', 'Account created successfully!');
    }

    // Login Employer
    public function signInEmployer(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:employers,email',
            'password' => 'required'

        ]);

        if (Auth::guard('employer')->attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->route('employer.dashboard')->with('success', 'Logged in successfully');
        }

        return back()->with('error', 'Invalid password');
    }

    // Logout
    public function employerLogout(Request $request)
    {
        Auth::guard('employer')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('employer.dashboard')->with('success', 'Logout successfully');
    }

    // Reset password
    public function employerPassReset(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:employer,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = Employer::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Email not found.');
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('employer.login')->with('success', 'Password has been reset successfully.');
    }

    // Delete Account 
    public function employerDelete()
    {

        $employerId = Auth::guard('employer')->user()->id;
        $employer = Employer::findOrFail($employerId);

        Auth::guard('employer')->logout();

        $employer->delete();

        return redirect()->route('employer.dashboard')->with('success', 'Deleted successfully!');
    }
}
