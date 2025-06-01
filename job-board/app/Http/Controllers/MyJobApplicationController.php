<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyJobApplicationController extends Controller
{

    public function index()
    {
        return view(
            'my_job_application.index',
            [
                'applications' => request()->user()->jobApplications()
                    ->with('job', 'job.employer')
                    ->whereHas('job')
                    ->latest()->get()
            ]
        );
    }

    public function destroy(string $id)
    {
        //
    }
}
