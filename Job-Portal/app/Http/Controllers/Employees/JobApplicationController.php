<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Models\PostedJob;
use App\Models\SavedJob;
use Illuminate\Support\Facades\Auth;

class JobApplicationController extends Controller
{

    public function showApplyForm($id)
    {
        $job = PostedJob::findOrFail($id);
        return view('employees.apply_form', compact('job'));
    }

    public function apply(Request $request, $id)
    {
        $request->validate([
            'cover_letter' => 'required|string',
            'resume' => 'required|mimes:pdf|max:2048',
        ]);

        $alreadyApplied = JobApplication::where('user_id', Auth::guard('web')->user()->id)
            ->where('posted_job_id', $id)
            ->exists();

        if ($alreadyApplied) {
            return redirect()->back()->with('warning', 'You have already applied for this job.');
        }


        $resumePath = $request->file('resume')->store('resumes', 'public');

        JobApplication::create([
            'user_id' => Auth::guard('web')->user()->id,
            'posted_job_id' => $id,
            'cover_letter' => $request->cover_letter,
            'resume' => $resumePath,
        ]);

        return redirect()->route('jobs')->with('success', 'Application submitted successfully!');
    }

    public function save($id)
    {
        $user = Auth::user();

        // Check if already saved
        $alreadySaved = SavedJob::where('user_id', $user->id)->where('posted_job_id', $id)->exists();

        if (!$alreadySaved) {
            SavedJob::create([
                'user_id' => $user->id,
                'posted_job_id' => $id,
            ]);
        }

        return redirect()->back()->with('success_', 'Job saved successfully!');
    }

    public function unsave($id)
    {
        $user = Auth::user();

        $savedJob = SavedJob::where('user_id', $user->id)
            ->where('posted_job_id', $id)
            ->first();

        if ($savedJob) {
            $savedJob->delete();
            return redirect()->back()->with('success_', 'Job unsaved successfully!');
        }

        return redirect()->back()->with('warning', 'This job is not in your saved list.');
    }
}
