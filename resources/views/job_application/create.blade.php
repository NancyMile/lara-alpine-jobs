<x-layout>
    <x-breadcrumb :links="['Jobs' => route('jobs.index'), $job->title => route('jobs.show',$job), 'Apply' => '#']" class="mb-4" />
    <x-job-card :$job/>
    <x-card>
        <h2 class="mb-4 text-lg font-medium">
            Your Job application
        </h2>
        <form action="{{ route('job.application.store',$job) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <x-label :required="true" for="expected_salary">Expected Salary</x-label>
                <x-text-input type="number" name="expected_salary" />
            </div>
            <div>
                <x-label :required="true" for="cv">Upload</x-label>
                <x-text-input type="file" name="cv" />
            </div>
            <x-button class="w-full bg-yellow-50">Apply</x-button>
        </form>
    </x-card>
</x-layout>
