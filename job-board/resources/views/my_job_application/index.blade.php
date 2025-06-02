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

                <div>
                    <form
                    method="POST"
                    action="{{route('my-job-applications.destroy', $application)}}">
                    @csrf
                    @method('DELETE')
                    <x-button>
                        Cancel
                    </x-button>
                    </form>
                </div>
            </div>
        </x-job-card>
    @empty
        <div class="rounded-md border border-dashed border-slate-300 p-8">
            <div class="text-center font-medium">
                No job application yet.
            </div>

            <div class="text-center">
                Find some jobs <a href="{{route('jobs.index')}}" class="text-indigo-500 hover:underline">here</a>
            </div>
        </div>
    @endforelse
</x-layout>