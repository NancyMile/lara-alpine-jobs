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
                <div>Cancel</div>
            </div>
        </x-job-card>
    @empty
        nothing to see
    @endforelse
</x-layout>
