<x-layout>
    <x-breadcrumbs class="mb-4"
        :links="['My Job Applications' => '#']"
    />

    @forelse ($applications as $application)
        <x-job-card :job="$application->job">
            <div class="flex items-center justify-between text-xs text-slate-500">
                <div>
                    <div>
                        <div>Applied {{$application->created_at->diffForHumans()}}</div>
                    </div>

                    <div>
                        Other {{Str::plural('applicant', $application->job->jobApplications_count - 1)}}
                        {{number_format($application->job->jobApplications_count - 1)}}
                    </div>

                    <div>
                        Your salary expectation: ${{number_format($application->expected_salary)}}
                    </div>

                    <div>
                        Average salary expectation: ${{number_format($application->job->jobApplications()->avg('expected_salary'))}}
                    </div>
                </div>

                <div>R</div>
            </div>
        </x-job-card>
    @empty
        <p>No job applications found.</p>
    @endforelse
</x-layout>