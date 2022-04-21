<div class="relative">
    <input type="text" wire:model.debounce.500ms="queryData" wire:click="getQueryData" class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="{{ $placeholder }}" autocomplete="mitracloud-off" />

    <span wire:loading class="absolute inset-y-2 right-0 flex items-center pr-2">
        <x-loading-indicator />
    </span>

    @if(isset($dataList) and count($dataList) > 0 and $isSelected == 0)
    <div class="absolute z-10 max-h-52 overflow-y-auto w-full bg-gray-50 rounded-t-none rounded-b-lg shadow-lg list-group">
        
        @foreach($dataList as $data)
            <div class="hover:bg-blue-400 hover:text-white hover:cursor-pointer px-2 py-1" wire:click="getValue({{ $data->id }}, '{{ $data->name }}')">{{ $data->name }}</div>
        @endforeach

    </div>
    @endif
</div>