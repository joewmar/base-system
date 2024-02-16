
@isset ($link)
    <a
        href="{{$link}}"
        class="inline-block rounded bg-gray-700 px-4 py-2 text-xs font-medium text-white hover:bg-gray-500"
    >
    {{$name}}
    </a>
@else
    <button
        type="button"
        @isset($ngClick) type="button" @endisset
        @isset($lwClick) type="submit" @endisset
        @isset($ngClick) ng-click="{{$ngClick}}" @endisset
        @isset($lwClick) wire:click="{{$lwClick}}" @endisset
        class="inline-block rounded bg-gray-700 px-4 py-2 text-xs font-medium text-white hover:bg-gray-500"
    >
    {{$name}}
    </button>
@endisset
