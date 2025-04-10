<?php

namespace App\Http\Controllers\Employers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PostedJob;

class PostJobController extends Controller
{
    public function postJob(Request $request)
    {
        $request->validate([
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
            'company_website' => 'nullable|string',
        ]);

        PostedJob::create([
            'job_title'        => $request->job_title,
            'company_name'     => Auth::guard('employer')->user()->company_name,
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
            'employer_id'      => Auth::guard('employer')->id(),
            'company_website'  => $request->company_website,
        ]);

        return redirect()->back()->with('success', 'Job posted successfully!');
    }
}
