<div class="relative">
    @if($formRef)
        <button  type="button" @click="$refs['input-{{ $name }}'].value = '';  $refs['{{ $formRef }}'].submit();" class="absolute top-0 right-0 flex h-full items-center pr-2 text-slate-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>
    @endif
    <input  x-ref="input-{{ $name }}" type="text" placeholder="{{ $placeholder }}" name="{{ $name }}" value="{{ $value }}"  id="{{ $name }}"
class="w-full round rounded-md  border-0 py-1.5 px-2.5 text-sm ring-1 ring-slate-300 placeholder:text-slate-400 focus:ring-2 pr-8"/>
</div>
