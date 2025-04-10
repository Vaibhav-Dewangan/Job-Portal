<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostedJob;

class JobController extends Controller
{
    //
    public function index(Request $request)
    {
        $query = PostedJob::query();

        if ($request->filled('job_title') && $request->filled('location')) {

            $query->where('job_title', 'like', '%' . $request->job_title . '%')
                ->where('location', 'like', '%' . $request->location . '%');
        } elseif ($request->filled('job_title')) {

            $query->where('job_title', 'like', '%' . $request->job_title . '%');
        } elseif ($request->filled('location')) {

            $query->where('location', 'like', '%' . $request->location . '%');
        }

        $jobs = $query->latest()->get();
        return view('employees.index', compact('jobs'));
    }

    public function show($id)
    {
        $job = PostedJob::findOrFail($id);
        return view('employees.job_details_mobile', compact('job'));
    }

    public function showForMd($id)
    {
        $job = PostedJob::findOrFail($id);
        return view('employees.components.job_card_indepth', compact('job'));
    }

    public function showSavedApplied($for, $id)
    {
        $job = PostedJob::findOrFail($id);
        return view('employees.job_applied_saved_details', compact('job'));
    }
}
