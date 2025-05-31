<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class JobApplicationController extends Controller
{
    use AuthorizesRequests;

    public function create(JobListing $job)
    {
        $this->authorize('apply', $job);
        return view('job_application.create', ['job' => $job]);
    }

    public function store(JobListing $job, Request $request)
    {
        $job->jobApplications()->create([
            'user_id' => request()->user()->id,
            ...$request->validate([
                'expected_salary' => 'required|integer|min:1|max:1000000',
            ])
        ]);

        return redirect()->route('jobs.show', $job)
            ->with('success', 'Job application submitted');
    }


    public function destroy(string $id)
    {
        //
    }
}
