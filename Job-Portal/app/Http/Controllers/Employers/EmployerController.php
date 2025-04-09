<?php

namespace App\Http\Controllers\Employers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employer;

class EmployerController extends Controller
{
    public function showEmployerData()
    {
        $employerId = Auth::guard('employer')->user()->id;
        $employer = Employer::with('postedJobs')->findOrFail($employerId);
        return view('employers.employer_account', compact('employer'));
    }

    public function uploadCover(Request $request)
    {
        $request->validate([
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $employerId = Auth::guard('employer')->user()->id;
        $employer = Employer::findOrFail($employerId);

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $path = $file->store('covers', 'public');
            $coverImage = basename($path);

            // Save the path to DB
            $employer->cover_image = $coverImage;
            $employer->save();
        }

        return back()->with('success', 'Cover image updated successfully!');
    }

    public function uploadLogo(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,jpg,png,webp|max:2040',
        ]);

        $employerId = Auth::guard('employer')->user()->id;
        $employer = Employer::findOrFail($employerId);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $path = $file->store('logos', 'public');
            $profile_image = basename($path);

            $employer->profile_image = $profile_image;
            $employer->save();
        }
        return back()->with('success', 'Profile image updated successfully!');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'company_website' => 'nullable|string',
            'about' => 'nullable|string',
            'location' => 'nullable|string',
        ]);

        $employerId = Auth::guard('employer')->user()->id;
        $employer = Employer::findOrFail($employerId);

        $employer->update([
            'company_address' => $request->company_address,
            'company_website' => $request->company_website,
            'about' => $request->about,
        ]);

        return back()->with('success', 'Company profile updated successfully.');
    }
}
