<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class JobController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request)
    {
        $this->authorize('viewAny', JobListing::class);
        $filters = $request->only(
            'search',
                'min_salary',
                'max_salary',
                'experience',
                'category'
            );

        return view(
            'jobs.index',
            ['jobs' => JobListing::with('employer')->latest()->filter($filters)->get()]);
    }

    public function show(JobListing $job)
    {
        $this->authorize('view', $job);
        return view('jobs.show', ['job' => $job->load('employer.jobs')]);
    }
}
