<label for="{{ $for }}" class="mb-2  block text-sm font-medium text-slate-950">
    {{ $slot }}
    @if($required)
        <span>*</span>
    @endif
</label>
