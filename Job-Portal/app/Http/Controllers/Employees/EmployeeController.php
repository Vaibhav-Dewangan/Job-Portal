<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\SavedJob;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function showEmployeeData()
    {

        $userId = Auth::guard('web')->user()->id;
        $user = User::findOrFail($userId);

        $savedJobs = SavedJob::with('job')
            ->where('user_id', $user->id)
            ->get();

        $appliedJobs = JobApplication::with('job')
            ->where('user_id', $user->id)
            ->get();
        return view('employees.user_account', compact('user', 'savedJobs', 'appliedJobs'));
    }

    public function updateProfileDetails(Request $request)
    {
        $userId = Auth::guard('web')->user()->id;
        $request->validate([
            'name' => 'nullable|string',
            'email' => 'nullable|email|unique:users,email,' . $userId,
            'contact' => 'nullable|string|unique:users,contact,' . $userId,
            'location' => 'nullable|string',
        ]);

        $user = User::findOrFail($userId);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->contact,
            'location' => $request->location,
        ]);

        return back()->with('success', 'Profile updated successfully.');
    }

    public function uploadProfileImg(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,jpg,png,webp|max:2040',
        ]);

        $userId = Auth::guard('web')->user()->id;
        $user = User::findOrFail($userId);

        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $path = $file->store('user-profile-img', 'public');
            $profile_image = basename($path);

            $user->profile_image = $profile_image;
            $user->save();
        }
        return back()->with('success', 'Profile image updated successfully!');
    }
}
