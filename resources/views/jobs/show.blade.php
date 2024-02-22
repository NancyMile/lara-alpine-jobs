<x-layout>
    <x-breadcrumb :links="['Jobs' => route('jobs.index'), $job->title =>'']" class="mb-4"/>
    <x-job-card :$job>
        <p class="text-sm text-slate-500 mb-4">
            {!! nl2br(e($job->description)) !!}
        </p>

        @if($job->tags)
            @foreach($job->tags as $tag)
            <div class="flex text-xs md:inline-flex">
                <x-tag>
                    <a href="{{ route('jobs.tags.index',['tag' => $tag->id]) }}">
                        {{ Str::ucfirst($tag->name) }}
                    </a>
                </x-tag>
            </div>
            @endforeach
        @endif

        @can('apply',$job)
            <x-link-button :href="route('job.application.create',$job)">Apply</x-link-button>
        @else
            <div class="text-center text-sm font-medium">
                You have already applied to this job.
            </div>
        @endcan
    </x-job-card>

    <x-card class="mb-4">
        <h2 class="mb-4 text-lg font-medium">
            More {{ $job->employer->company_name }} jobs.
        </h2>

        <div class="text-sm text-slate-500">
            @foreach ($job->employer->jobs as $otherJob )
                <div class="mb-4 flex justify-between">
                    <div>
                        <div class=" text-slate-700">
                            <a href="{{ route('jobs.show',$otherJob) }}">{{ $job->title }}</a>
                        </div>
                        <div class="text-xs">
                            {{ $job->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <div class="text-xs">
                        ${{ number_format($otherJob->salary)  }}
                    </div>
                </div>
            @endforeach
        </div>

    </x-card>
</x-layout>
