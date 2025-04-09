<?php

namespace App\Http\Controllers\Employers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostedJob;
use Illuminate\Support\Facades\Auth;

class EditJobController extends Controller
{
    public function editJob(Request $request)
    {
        $request->validate([
            'job_id'          => 'required|exists:posted_jobs,id',
            'job_title'       => 'required|string|max:255',
            'location'        => 'required|string|max:255',
            'min_salary'      => 'nullable|integer',
            'max_salary'      => 'nullable|integer',
            'contract_length' => 'nullable|string|max:255',
            'experience'      => 'nullable|string|max:255',
            'job_type'        => 'required|string',
            'schedule'        => 'required|array',
            'description'     => 'required|string',
            'responsibilities' => 'nullable|string',
            'qualifications'  => 'nullable|string',
            'industry_sector' => 'required|string',
            'skills'          => 'required|string',
        ]);

        $job = PostedJob::where('id', $request->job_id)
            ->where('employer_id', Auth::guard('employer')->id())
            ->firstOrFail();

        $job->update([
            'job_title'        => $request->job_title,
            'location'         => $request->location,
            'min_salary'       => $request->min_salary,
            'max_salary'       => $request->max_salary,
            'contract_length'  => $request->contract_length,
            'experience'       => $request->experience,
            'job_type'         => $request->job_type,
            'schedule'         => $request->schedule,
            'description'      => $request->description,
            'responsibilities' => $request->responsibilities,
            'qualifications'   => $request->qualifications,
            'industry_sector'  => $request->industry_sector,
            'skills'           => $request->skills,
        ]);

        return redirect()->back()->with('success', 'Job updated successfully!');
    }

    public function deleteJob($id)
    {

        $job = PostedJob::findOrFail($id);
        $job->delete();

        return back()->with('success', 'Job deleted successfully');
    }
}
