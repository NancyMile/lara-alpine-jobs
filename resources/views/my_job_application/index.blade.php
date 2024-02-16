<x-layout>
    <x-breadcrumb class="mb-4" :links="['My Job Applications' => '#']" />

    @forelse ($applications as $application )
        <x-job-card :job="$application->job">

        </x-job-card>
    @empty
        nothing to see
    @endforelse
</x-layout>
