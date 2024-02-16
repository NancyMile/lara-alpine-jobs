<x-layout>
    <x-breadcrumb class="mb-4" :links="['My Job Applications' => '#']" />

    @forelse ($applications as $application )
        <x-job-card :job="$application->job">
            <div class=" flex items-center justify-between text-sm text-slate-500">
                <div>
                    <div>
                        Applied {{ $application->created_at->diffForHumans() }}
                    </div>
                    <div>
                        Requested salary is:  {{ number_format($application->expected_salary) }}
                    </div>
                    <div>
                        Avg salary requested: {{ number_format($application->job->job_applications_avg_expected_salary) }}
                    </div>
                    <div>
                        Other Applicants: {{  Str::plural('applicant', $application->job->job_applications_count -1) }}
                        {{ $application->job->job_applications_count -1 }}
                    </div>
                </div>
                <div>
                    <form action="{{ route('my-job-applications.destroy',$application) }}" method="POST">
                    @csrf
                    @method('delete')
                    <x-button>Cancel</x-button>
                    </form>
                </div>
            </div>
        </x-job-card>
    @empty
        <div class="rounded-md border border-dashed border-slate-300 p-8">
            <div class="text-center font-medium">
                No jobs applications.
            </div>
            <div class="text-center">
                Find some jobs <a class="text-indigo-500 hover:underline" href="{{ route('jobs.index') }}">Here</a>
            </div>
        </div>
    @endforelse
</x-layout>
