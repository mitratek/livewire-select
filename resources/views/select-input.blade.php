<div x-data="{ dropdownOpen: false }" class="relative">
    <input @click="dropdownOpen = ! dropdownOpen" @click.away="dropdownOpen = false" type="text" wire:model.debounce.1000ms="queryData" wire:click="getQueryData" wire:keydown.tab="getQueryData" class="w-full shadow appearance-none border rounded py-2 pl-3 pr-8 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="{{ $placeholder }}" autocomplete="mitracloud-off" />

    <span wire:loading class="absolute inset-y-2 right-0 flex items-center pr-2">
        <x-loading-indicator />
    </span>

    <span wire:loading.remove class="absolute inset-y-2 right-0 flex items-center pr-2">
        <div wire:click="clearValue()">
            <x-clear-button />
        </div>
    </span>

    @if(isset($message))
    <div class="absolute z-10 max-h-20 overflow-y-auto w-full bg-gray-50 rounded-t-none rounded-b-lg shadow-lg list-group">
        <div class="text-sm px-2 py-1">{{ $message }}</div>
    </div>
    @endif

    @if(isset($dataList) and count($dataList) > 0 and $isSelected == 0)
    <div x-show="dropdownOpen" class="absolute z-10 max-h-52 overflow-y-auto w-full bg-gray-50 rounded-t-none rounded-b-lg shadow-lg list-group">
        
        @foreach($dataList as $data)
            <div wire:click="getValue({{ $data['id'] }}, '{{ $data['value'] }}')" wire:key="option-{{ $loop->index }}" class="hover:bg-blue-400 hover:text-white hover:cursor-pointer px-2 py-1">{{ $data['value'] }}</div>
        @endforeach

    </div>
    @endif
</div>