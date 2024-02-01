<x-layout>
    <x-breadcrumb :links="['Jobs' => route('jobs.index')]" class="mb-4"/>

    <x-card class="mb-4 text-sm ">
        <form action="{{ route('jobs.index') }}" method="GET">
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <div class="mb-1 font-semibold">
                        Search
                    </div>
                    <x-text-input name="search" value="{{ request('search') }}" placeholder="search"/>
                </div>
                <div>
                    <div class="mb-1 font-semibold">
                        Salary
                    </div>
                    <div class="flex space-x-2">
                        <x-text-input name="min_salary" value="{{ request('min_salary') }}" placeholder="from" />
                        <x-text-input name="max_salary" value="{{ request('max_salary') }}" placeholder="to" />
                    </div>
                </div>
                <div>3</div>
                <div>4</div>
            </div>
            <button type="submit" class="w-full">Search</button>
        </form>
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


