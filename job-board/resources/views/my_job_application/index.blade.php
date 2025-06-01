<x-layout>
    <x-breadcrumbs class="mb-4"
        :links="['My Job Applications' => '#']"
    />

    @forelse ($applications as $application)
        <x-job-card :job="$application->job">

        </x-job-card>
    @empty
        <p>No job applications found.</p>
    @endforelse
</x-layout>