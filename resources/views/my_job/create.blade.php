<x-layout>
    <x-breadcrumb :links="['My Jobs' => route('my-jobs.index'),'Create' => '#']"  class="mb-4"/>
    <x-card class="mb-8">
        <form action="{{ route('my-jobs.store') }}" method="POST">
        @csrf
        <div class=" mb-4 grid grid-cols-2 gap-4">
            <div>
                <x-label for="title" :required="true">Job Title</x-label>
                <x-text-input type="text" name="title" />
            </div>
            <div>
                <x-label for="location" :required="true">Location</x-label>
                <x-text-input type="text" name="location" />
            </div>
            <div class="col-span-2">
                <x-label for="salary" :required="true">Salary</x-label>
                <x-text-input type="number" name="salary" />
            </div>
            <div class="col-span-2">
                <x-label for="description" :required="true">Description</x-label>
                <x-text-input type="textarea" name="description" />
            </div>
            <div>
                <x-label for="experience" :required="true">Experience</x-label>
                <x-radio-group name="experience" :value="old('experience')" :all-option="false"
                    :options=App\Models\Job::$experience/>
            </div>
            <div>
                <x-label for="category" :required="true">Category</x-label>
                <x-radio-group name="category" :all-option="false" :options=App\Models\Job::$category/>
            </div>
            <div class="col-span-2">
                <x-button class="w-full">Create Job</x-button>
            </div>
        </div>
        </form>
    </x-card>
</x-layout>
