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
        $this->authorize('apply', $job);

        $validatedData = $request->validate([
            'expected_salary' => 'required|integer|min:1|max:1000000',
            'cv' => 'required|file|mimes:pdf|max:2048',
        ]);

        $file = $request->file('cv');
        $path = (string)$file->store('cvs', 'private');

        $job->jobApplications()->create([
            'user_id' => request()->user()->id,
            'expected_salary' => $validatedData['expected_salary'],
            'cv_path' => $path,
            ]);

        return redirect()->route('jobs.show', $job)
            ->with('success', 'Job application submitted');
    }


    public function destroy(string $id)
    {
        //
    }
}
