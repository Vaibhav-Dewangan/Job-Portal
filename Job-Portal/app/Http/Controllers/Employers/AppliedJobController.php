<?php

namespace App\Http\Controllers\Employers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostedJob;

class AppliedJobController extends Controller
{
    public function showAppliedUsers($jobId)
    {
        $job = PostedJob::with('applications.user')->findOrFail($jobId);

        return view('employers.view_applicants', [
            'applications' => $job->applications
        ]);
    }
}
