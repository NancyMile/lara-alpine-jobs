<x-layout>
    <x-card>
        <form action="{{ route('employer.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <x-label for="company_names" :required="true">
                    Company Name
                </x-label>
                <x-text-input type="text" name="company_name" />
            </div>
            <x-button class="w-full">Create</x-button>
        </form>
    </x-card>
</x-layout>
