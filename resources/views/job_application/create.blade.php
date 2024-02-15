<x-layout>
    <x-breadcrumb :links="['Jobs' => route('jobs.index'), $job->title => route('jobs.show',$job), 'Apply' => '#']" class="mb-4" />
    <x-job-card :$job/>
    <x-card>
        <h2 class="mb-4 text-lg font-medium">
            Your Job application
        </h2>
        <form action="{{ route('job.application.store',$job) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-slate-900" for="expected_salary">Expected Salary</label>
                <x-text-input type="number" name="expected_salary" />
            </div>
            <x-button class="w-full bg-yellow-50">Apply</x-button>
        </form>
    </x-card>
</x-layout>
