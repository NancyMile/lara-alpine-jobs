<x-layout>
    <x-breadcrumb :links="['Jobs' => route('jobs.index')]" class="mb-4"/>

    <x-card class="mb-4 text-sm ">
        <div class="mb-4 grid grid-cols-2 gap-4">
            <div>
                <div class="mb-1 font-semibold">
                    Search
                </div>
                <x-text-input name="search" value="" placeholder="search"/>
            </div>
            <div>
                <div class="mb-1 font-semibold">
                    Salary
                </div>
                <div class="flex space-x-2">
                    <x-text-input name="min_salary" value="" placeholder="from" />
                    <x-text-input name="max_salary" value="" placeholder="to" />
                </div>
            </div>
            <div>3</div>
            <div>4</div>
        </div>
    </x-card>

    @foreach ($jobs as $job )
    <x-job-card class="mb-4" :$job>
        <div>
            <x-link-button :href="route('jobs.show',$job)">
                Show
            </x-link-button>
        </div>
    </x-job-card>
    @endforeach
</x-layout>


